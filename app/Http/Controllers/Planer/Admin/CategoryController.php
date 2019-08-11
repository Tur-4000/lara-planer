<?php

namespace App\Http\Controllers\Planer\Admin;

use App\Http\Requests\PlanerCategoryCreateRequest;
use App\Http\Requests\PlanerCategoryUpdateRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\WebColorRepository;
use Illuminate\Http\Request;

class CategoryController extends AdminBaseController
{
    private $categoryRepository;

    private $webColorRepository;

    public function __construct()
    {
        parent::__construct();

        $this->categoryRepository = app(CategoryRepository::class);
        $this->webColorRepository = app(WebColorRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd(__METHOD__, \request()->all());
        $paginator = $this->categoryRepository->getAllWithPaginate(15);

        return view('planer.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        dd(__METHOD__, \request()->all());

        $title = 'Создать категорию';
        $item = new Category();
        $colorList = $this->webColorRepository->getForComboBox();

        return view(
            'planer.admin.categories.edit',
            compact('item', 'colorList', 'title')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanerCategoryCreateRequest $request)
    {
//        dd(__METHOD__, \request()->all());
        $data = $request->input();
        $item = (new Category())->create($data);

        if ($item) {
            return redirect()->route('planer.admin.categories.index', [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
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
        $title = 'Редактировать категорию';
        $item = $this->categoryRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }
        $colorList = $this->webColorRepository->getForComboBox();

        return view(
            'planer.admin.categories.edit',
            compact('item', 'colorList', 'title')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlanerCategoryUpdateRequest $request, $id)
    {
//        dd(__METHOD__, \request()->all());
        $item = $this->categoryRepository->getEdit($id);
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Категория id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('planer.admin.categories.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
}
