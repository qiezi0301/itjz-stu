<?php

namespace App\Admin\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class UserController extends Controller
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
            ->header('用户列表')
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
            ->header('用户详情')
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
            ->header('修改用户')
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
            ->header('创建用户')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User);

        $grid->id('Id');
        $grid->avatar('头像')->image(config('/'),30,30);
        $grid->name('姓名');
        $grid->email('邮箱');
        $grid->settings('用户设置');
        $grid->is_active('是否活动');
        $grid->created_at('注册时间');

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
        $show = new Show(User::findOrFail($id));

        $show->id('Id');
        $show->avatar('头像')->image(config('/'),50,50);
        $show->name('姓名');
        $show->email('邮箱');
        $show->settings('用户设置');
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
        $form = new Form(new User);

        $form->text('name', '姓名')->rules('required|between:3,25');
        $form->email('email', '邮箱')->rules(function ($form) {

                return 'required|unique:users,email,'.$form->model()->id;

        });
        $form->password('password', '密码')->placeholder('输入重置密码')
            ->rules('required|min:6')
            ->default(function ($form) {
            return $form->model()->password;
        });
        $form->image('avatar', '头像')->move('/images/avatars')->default('/uploads/images/avatars/default.png');
        $form->text('settings', '用户设置');
        //隐藏域
        $form->hidden('confirmation_token', '邮箱认证token')->default(str_random(40));
        $form->switch('is_active', 'Is active');

//        //保存前回调
//        $form->saving(function (Form $form) {
//            if ($form->password) {
//                $form->password = bcrypt($form->password);
//            }else{
//                //如果密码为空就使用原来密码
//                $form->password = $form->model()->password;
//            }
//        });

        //保存前回调
        $form->saving(function (Form $form) {
            if ($form->password && $form->model()->password != $form->password) {
                $form->password = bcrypt($form->password);
            }
        });

        return $form;
    }
}
