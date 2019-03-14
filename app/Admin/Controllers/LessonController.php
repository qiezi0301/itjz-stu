<?php

namespace App\Admin\Controllers;

use App\Lesson;
use App\Http\Controllers\Controller;
use App\Serie;
use App\User;
use Encore\Admin\Admin;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use GrahamCampbell\Markdown\Facades\Markdown;

class LessonController extends Controller
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
            ->header('课程列表')
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
            ->header(Lesson::findOrFail($id)->title)
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
            ->header('Edit')
            ->description('description')
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
            ->header('添加学习')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Lesson);

        $grid->id('Id')->sortable();
        $grid->serie()->title('系列');
        $grid->title('标题')->editable();
        $grid->video_Path('视频地址');
        $grid->views_count('查看总数');
        $grid->comments_count('评论总数');


        $grid->close_comment('可否评论')->editable('select', ['T' => '是', 'F' => '否']);
        $grid->is_hidden('是否隐藏')->editable('select', ['T' => '是', 'F' => '否']);
        $grid->created_at('创建时间');
        $grid->updated_at('更新时间');

        $grid->filter(function ($filter) {
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            $filter->column(1/2, function ($filter) {
                $filter->equal('serie_id', '选择系列')->select(Serie::pluck('title', 'id'));
            });
            $filter->column(1/2, function ($filter) {
                $filter->like('title', '标题');
            });

        });

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
        $show = new Show(Lesson::findOrFail($id));

        $show->id('Id');
        $show->title('标题');
        $show->serie_id('系列')->as(function ($id) {
            $serie = Serie::find($id);
            if ($serie) {
                return $serie->title;
            }
        });
        $show->body('内容')->unescape()->as(function ($body) {
            return Markdown::convertToHtml($body);
        });
        $show->video_Path('视频地址');
        $show->views_count('查看总数');
        $show->comments_count('评论总数');
        $show->close_comment('可否评论')->using(['T' => '是', 'F' => '否']);;
        $show->is_hidden('是否显示')->using(['T' => '是', 'F' => '否']);;
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

        $userModel = config('admin.database.users_model');
        $form = new Form(new Lesson);

        $form->text('title', '标题');

//        $form->select('serie_id', '系列')->options(function ($id) {
//            $serie = Serie::find($id);
//
//            if ($serie) {
//                return [$serie->id => $serie->title];
//            }
//        });
        // 也可以设置label
        $form->select('serie_id', '系列')->options(Serie::pluck('title', 'id'));
        $form->select('user_id', '作者')->options($userModel::pluck('username', 'id'));

        $form->simplemde('body', '内容');
        $form->file('video_Path', '视频')->move('/videos');
        $form->radio('close_comment', '是否评论')->options(['F' => '否', 'T'=> '是'])->default('F');
        $form->radio('is_hidden', '是否显示')->options(['F' => '否', 'T'=> '是'])->default('F');
        return $form;
    }
}
