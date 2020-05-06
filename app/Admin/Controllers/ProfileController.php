<?php

namespace App\Admin\Controllers;

use App\Model\Profile;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class ProfileController extends Controller
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
            ->header('Index')
            ->description('description')
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
            ->header('Detail')
            ->description('description')
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
        $grid = new Grid(new Profile);

        $grid->id('Id');
        $grid->name('Name');
        $grid->foreign_name('Foreign name');
        $grid->begin_time('Begin time');
        $grid->qq('Qq');
        $grid->mail('Mail');
        $grid->github('Github');
        $grid->avator_url('Avator url');
        $grid->weibo('Weibo');
        $grid->description('Description');

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
        $show = new Show(Profile::findOrFail($id));

        $show->id('Id');
        $show->name('Name');
        $show->foreign_name('Foreign name');
        $show->begin_time('Begin time');
        $show->qq('Qq');
        $show->mail('Mail');
        $show->github('Github');
        $show->avator_url('Avator url');
        $show->weibo('Weibo');
        $show->description('Description');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Profile);

        $form->text('name', 'Name');
        $form->text('foreign_name', 'Foreign name');
        $form->number('begin_time', 'Begin time');
        $form->number('qq', 'Qq');
        $form->email('mail', 'Mail');
        $form->text('github', 'Github');
        $form->text('avator_url', 'Avator url');
        $form->text('weibo', 'Weibo');
        $form->textarea('description', 'Description');

        return $form;
    }
}
