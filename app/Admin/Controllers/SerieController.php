<?php

namespace App\Admin\Controllers;

use App\Serie;
use App\Http\Controllers\Controller;
use Encore\Admin\Widgets\table;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class SerieController extends Controller
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
            ->header('系列列表')
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
            ->header(Serie::findOrFail($id)->title)
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
            ->header('编辑')
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
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {

        $grid = new Grid(new Serie);

        $grid->header(function ($query) {
            return 'header';
        });
        $grid->id('Id')->sortable();
        $grid->title('标题')->display(function ($title) {
            $count = $this->lessons()->count();
            return $title.'('.$count.')';
        });
//        $grid->title('标题')->modal('最新课程', function ($model) {
//            $lessons = $model->lessons()->take(10)->get()->map(function ($comment) {
//                return $comment->only(['id', 'title', 'created_at']);
//            });
//            return new Table(['ID', '标题', '发布时间'], $lessons->toArray());
//        })->display(function ($title) {
//            $count = $this->lessons()->count();
//            return $title.'('.$count.')';
//        });
//        $grid->lessons()->display(function ($lessons) {
//
//            $lessons = array_map(function ($lesson) {
//                return "<span class='label label-success'>{$lesson['title']}</span>";
//            }, $lessons);
//
//            return join('&nbsp;', $lessons);
//        });;


//        $url = $disk->signUrl($lesson['video_Path'], $timeout);


        $grid->banner('Banner')->display(function ($banner) {
            $disk = \Storage::disk('oss');
            $url = $disk->signUrl($banner, env('TIMEOUT'));
            return str_replace('http://' . env('OSS_BUCKET') . '.' . env('OSS_ENDPOINT') . '/', '', $url);
        })->image(env('OSS_URL'),70,50);
        $grid->description('描述')->display(function ($des){
            return str_limit($des, 10);
        });
        $grid->created_at('创建时间');
        $grid->updated_at('更新时间');
        $grid->filter(function ($filter) {
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 设置created_at字段的范围查询
            $filter->like('title', '标题');
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
        $show = new Show(Serie::findOrFail($id));

        $show->id('Id');
        $show->title('标题');
        $show->description('描述');
        $show->banner('Banner')->as(function ($banner) {
            $disk = \Storage::disk('oss');
            $url = $disk->signUrl($banner, env('TIMEOUT'));
            return str_replace('http://' . env('OSS_BUCKET') . '.' . env('OSS_ENDPOINT') . '/', '', $url);
        })->image(env('OSS_URL'),370,150);
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
        $form = new Form(new Serie);

        $form->text('title', '标题');
        $form->textarea('description', '描述');
//        $form->display('banner', '图片')->with(function ($banner) {
//            $disk = \Storage::disk('oss');
//            $url = $disk->signUrl($banner, env('TIMEOUT'));
//            return "<img src=".str_replace('http://' . env('OSS_BUCKET') . '.' . env('OSS_ENDPOINT') . '/', env('OSS_URL'), $url)." />";
//        });
//        $form->image('banner', '图片')->move('/images/series/'.date('Y-m-d', time()))->uniqueName();
        $form->image('banner', '图片')->move('/images/series');
        return $form;
    }
}
