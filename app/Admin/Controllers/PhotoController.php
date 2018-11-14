<?php

namespace App\Admin\Controllers;

use App\Model\Photo;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PhotoController extends Controller
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
        $grid = new Grid(new Photo);

        $grid->id('Id');
        $grid->uid('Uid');
        $grid->imgurl('Imgurl');
        $grid->isdel('Isdel');
        $grid->time('Time');
        $grid->ip('Ip');
        $grid->year('Year');
        $grid->month('Month');
        $grid->visit('Visit');
        $grid->description('Description');
        $grid->thumb_url('Thumb url');

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
        $show = new Show(Photo::findOrFail($id));

        $show->id('Id');
        $show->uid('Uid');
        $show->imgurl('Imgurl');
        $show->isdel('Isdel');
        $show->time('Time');
        $show->ip('Ip');
        $show->year('Year');
        $show->month('Month');
        $show->visit('Visit');
        $show->description('Description');
        $show->thumb_url('Thumb url');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Photo);

        $form->number('uid', 'Uid');
        $form->text('imgurl', 'Imgurl');
        $form->switch('isdel', 'Isdel');
        $form->number('time', 'Time');
        $form->ip('ip', 'Ip');
        $form->number('year', 'Year');
        $form->number('month', 'Month');
        $form->number('visit', 'Visit');
        $form->text('description', 'Description');
        $form->text('thumb_url', 'Thumb url');

        return $form;
    }
}
