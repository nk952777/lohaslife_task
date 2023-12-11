<?php

namespace App\Admin\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioTranslation;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Str;

class PortfolioController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '產品管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Portfolio());

        $grid->column('id', __('admin.id'));
        // 添加一个自定义列来显示特定语言的翻译
        $grid->column('content', __('portfolio.description'))->display(function () {
            // 假设你有一个方法来获取特定语言的翻译
            $translation = $this->translations()->where('locale', 'zh-TW')->first();
            return $translation ? Str::limit($translation->content, 60) : '';
        });

        $grid->column('cover', __('portfolio.cover'))->image('', '100', '100');
        $grid->column('weight', __('portfolio.weight'));
        $grid->column('created_at', __('admin.created_at'));
        $grid->column('updated_at', __('admin.updated_at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Portfolio::findOrFail($id));

        $show->field('id', __('admin.id'));
        $show->field('name', __('portfolio.name'));
        $show->field('content', __('portfolio.description'));
        $show->field('cover', __('portfolio.cover'));
        $show->field('weight', __('portfolio.weight'));
        $show->field('created_at', __('admin.created_at'));
        $show->field('updated_at', __('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Portfolio());

        $form->image('cover', __('portfolio.cover'));
        $form->number('weight', __('portfolio.weight'))->default(0);

        // 处理多语言字段
        $locales = ['zh-TW', 'zh-CN', 'en']; // 支持的语言

        foreach ($locales as $locale) {
            $form->tab('語言 ' . $locale, function ($form) use ($locale) {
                //$form->text("translations.$locale.name", '名稱');
                $form->text("translations.$locale.name", '名稱')
                    ->default(function ($form) use ($locale) {
                        return $form->model()->translations()->where('locale', $locale)->first()->name ?? '';
                    });
                $form->ckeditor("translations.$locale.content", '描述')
                    ->default(function ($form) use ($locale) {
                        return $form->model()->translations()->where('locale', $locale)->first()->content ?? '';
                    });
            });
        }
       
        // 保存前的回调
        $form->saving(function (Form $form) {
            $translations = request()->input('translations', []);

            $portfolio = $form->model();
            $portfolio->cover = $form->cover; 
            $portfolio->weight = $form->weight; 

            if ($form->isCreating()) {
                // 创建操作
                // 首先保存主实体以获取 id
                $portfolio->save(); // 保存主实体
                // 然后保存翻译数据
                foreach ($translations as $locale => $data) {
                    $translation = new PortfolioTranslation([
                        'locale' => $locale,
                        'name' => $data['name'],
                        'content' => $data['content']
                    ]);
                    $portfolio->translations()->save($translation);
                }
            } else if ($form->isEditing()) {
                // 编辑操作
                // 更新主实体和翻译数据
                // 删除旧的翻译
                if ($portfolio->id) {
                    PortfolioTranslation::where('portfolio_id', $portfolio->id)->delete();
                }
                foreach ($translations as $locale => $data) {
                    $translation = $portfolio->translations()->firstOrNew(['locale' => $locale]);
                    $translation->name = $data['name'];
                    $translation->content = $data['content'];
                    $translation->save();
                }
            }
        });

        return $form;
    }
}
