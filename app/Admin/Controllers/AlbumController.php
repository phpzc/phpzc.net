<?php

namespace App\Admin\Controllers;

use App\Model\Album;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class AlbumController extends Controller
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
        $grid = new Grid(new Album);

        $grid->id('Id');
        $grid->title('Title');
        $grid->content('Content');
        $grid->time('Time');
        $grid->uid('Uid');
        $grid->visit('Visit');
        $grid->year('Year');
        $grid->month('Month');
        $grid->ip('Ip');
        $grid->isdel('Isdel');
        $grid->auth('Auth');
        $grid->face('Face');
        $grid->num('Num');

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
        $show = new Show(Album::findOrFail($id));

        $show->id('Id');
        $show->title('Title');
        $show->content('Content');
        $show->time('Time');
        $show->uid('Uid');
        $show->visit('Visit');
        $show->year('Year');
        $show->month('Month');
        $show->ip('Ip');
        $show->isdel('Isdel');
        $show->auth('Auth');
        $show->face('Face');
        $show->num('Num');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Album);

        $form->text('title', 'Title');
        $form->text('content', 'Content');
        $form->number('time', 'Time');
        $form->number('uid', 'Uid');
        $form->number('visit', 'Visit');
        $form->number('year', 'Year');
        $form->number('month', 'Month');
        $form->ip('ip', 'Ip');
        $form->number('isdel', 'Isdel');
        $form->switch('auth', 'Auth');
        $form->text('face', 'Face');
        $form->number('num', 'Num');

        return $form;
    }
}
