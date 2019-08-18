<?php

namespace App\Http\Controllers\Planer;

use App\Http\Requests\PlanerCreateRequest;
use App\Models\ToDoList;
use App\Repositories\CategoryRepository;
use App\Repositories\ToDoListRepository;
use Illuminate\Http\Request;

class ToDoListController extends BaseController
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @var ToDoListRepository
     */
    private $toDoListRepository;

    public function __construct()
    {
        parent::__construct();

        $this->categoryRepository = app(CategoryRepository::class);
        $this->toDoListRepository = app(ToDoListRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd(__METHOD__, \request()->all());
        $paginator = $this->toDoListRepository->getAllWithPaginate(25);

//        dd(__METHOD__, $paginator);

        return view('planer.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd(__METHOD__, \request()->all());
        $title = 'Создать задачу';
        $item = new ToDoList();
        $categoryList = $this->categoryRepository->getForComboBox();

        return view(
            'planer.create',
            compact('title', 'item', 'categoryList')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanerCreateRequest $request)
    {
//        dd(__METHOD__, \request()->all());
        $data = $request->input();
        $item = (new ToDoList())->create($data);

        if ($item) {
            return redirect()->route('tasks.edit', [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        dd(__METHOD__, \request()->all());
        $task = $this->toDoListRepository->getTask($id);
//        dd(__METHOD__, \request()->all(), $task);
        return view('planer.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        dd(__METHOD__, \request()->all());
        $title = 'Редактировать задачу';
        $item = (new ToDoList())->findOrFail($id);
        $categoryList = $this->categoryRepository->getForComboBox();

        return view('planer.edit', compact('item', 'categoryList', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd(__METHOD__, \request()->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(__METHOD__, \request()->all());
    }
}
