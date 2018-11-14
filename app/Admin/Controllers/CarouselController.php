<?php

namespace App\Admin\Controllers;

use App\Model\Index;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class CarouselController extends Controller
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
        $grid = new Grid(new Index);

        $grid->id('Id');
        $grid->imgurl('Imgurl');
        $grid->href('Href');
        $grid->description('Description');
        $grid->type('Type');
        $grid->status('Status');
        $grid->title('Title');
        $grid->sort('Sort');

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
        $show = new Show(Index::findOrFail($id));

        $show->id('Id');
        $show->imgurl('Imgurl');
        $show->href('Href');
        $show->description('Description');
        $show->type('Type');
        $show->status('Status');
        $show->title('Title');
        $show->sort('Sort');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Index);

        $form->text('imgurl', 'Imgurl');
        $form->url('href', 'Href');
        $form->text('description', 'Description');
        $form->number('type', 'Type');
        $form->switch('status', 'Status')->default(1);
        $form->text('title', 'Title');
        $form->number('sort', 'Sort');

        return $form;
    }
}
