<?php

namespace App\Admin\Controllers;

use App\Comment;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use GrahamCampbell\Markdown\Facades\Markdown;

class CommentController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('评论列表')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('评论详情')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('编辑评论')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('创建评论')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Comment);

        $grid->id('Id');
        $grid->user_id('用户');
        $grid->body('内容');
        $grid->parent_id('被评论的用户');
        $grid->level('层级');
        $grid->is_hidden('是否屏蔽');
        $grid->created_at('创建时间');
        $grid->updated_at('更新时间');

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
        $show = new Show(Comment::findOrFail($id));

        $show->id('Id');
        $show->user_id('评论者');
        $show->body('内容')->unescape()->as(function ($body) {
            return Markdown::convertToHtml($body);
        });;
        $show->commentable_id('可评论的身份证');
        $show->commentable_type('可评论的类型');
        $show->parent_id('父级');
        $show->level('等级');
        $show->is_hidden('是否屏蔽');
        $show->created_at('创建时间');
        $show->updated_at('更新时间');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Comment);

        $form->number('user_id', '用户身份');
        $form->simplemde('body', '内容');
        $form->number('commentable_id', 'Commentable id');
        $form->text('commentable_type', 'Commentable type');
        $form->number('parent_id', 'Parent id');
        $form->number('level', 'Level')->default(1);
        $form->text('is_hidden', 'Is hidden')->default('F');

        return $form;
    }
}
