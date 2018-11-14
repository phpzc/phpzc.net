<?php

namespace App\Admin\Controllers;

use App\Model\Document;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class DocumentController extends Controller
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
        $grid = new Grid(new Document);

        $grid->id('Id');
        $grid->title('Title');
        $grid->author('Author');
        $grid->imgurl('Imgurl');
        $grid->url('Url');
        $grid->urltype('Urltype');
        $grid->doctype('Doctype');
        $grid->content('Content');
        $grid->time('Time');
        $grid->uid('Uid');
        $grid->bpath('Bpath');
        $grid->visit('Visit');
        $grid->year('Year');
        $grid->month('Month');
        $grid->ip('Ip');
        $grid->isdel('Isdel');

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
        $show = new Show(Document::findOrFail($id));

        $show->id('Id');
        $show->title('Title');
        $show->author('Author');
        $show->imgurl('Imgurl');
        $show->url('Url');
        $show->urltype('Urltype');
        $show->doctype('Doctype');
        $show->content('Content');
        $show->time('Time');
        $show->uid('Uid');
        $show->bpath('Bpath');
        $show->visit('Visit');
        $show->year('Year');
        $show->month('Month');
        $show->ip('Ip');
        $show->isdel('Isdel');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Document);

        $form->text('title', 'Title');
        $form->text('author', 'Author');
        $form->text('imgurl', 'Imgurl');
        $form->url('url', 'Url');
        $form->switch('urltype', 'Urltype');
        $form->switch('doctype', 'Doctype');
        $form->textarea('content', 'Content');
        $form->number('time', 'Time');
        $form->number('uid', 'Uid');
        $form->text('bpath', 'Bpath');
        $form->number('visit', 'Visit');
        $form->number('year', 'Year');
        $form->number('month', 'Month');
        $form->number('ip', 'Ip');
        $form->number('isdel', 'Isdel');

        return $form;
    }
}
