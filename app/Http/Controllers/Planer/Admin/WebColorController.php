<?php

namespace App\Http\Controllers\Planer\Admin;

use App\Http\Requests\PlanerWebColorCreateRequest;
use App\Http\Requests\PlanerWebColorUpdateRequest;
use App\Models\WebColor;
use Illuminate\Http\Request;
use App\Repositories\WebColorRepository;

class WebColorController extends AdminBaseController
{
    /**
     * @var WebColorRepository
     */
    private $webColorRepository;

    public function __construct()
    {
        parent::__construct();

        $this->webColorRepository = app(WebColorRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = $this->webColorRepository->getAllWithPaginate(15);

        return view('planer.admin.webcolors.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new WebColor();

        return view('planer.admin.webcolors.edit', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlanerWebColorCreateRequest $request)
    {
        $data = $request->input();

        $item = (new WebColor())->create($data);

        if ($item) {
            return redirect()->route('planer.admin.colors.index', [$item->id])
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
        $item = $this->webColorRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        return view('planer.admin.webcolors.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlanerWebColorUpdateRequest $request, $id)
    {
        $item = $this->webColorRepository->getEdit($id);
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('planer.admin.colors.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
}
