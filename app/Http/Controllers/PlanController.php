<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use App\Repositories\PlanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PlanController extends AppBaseController
{
    /** @var  PlanRepository */
    private $planRepository;

    public function __construct(PlanRepository $planRepo)
    {
        $this->planRepository = $planRepo;
    }

    /**
     * Display a listing of the Plan.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $plans = $this->planRepository->paginate(10);

        return view('plans.index')
            ->with('plans', $plans);
    }

    /**
     * Show the form for creating a new Plan.
     *
     * @return Response
     */
    public function create()
    {
        return view('plans.create');
    }

    /**
     * Store a newly created Plan in storage.
     *
     * @param CreatePlanRequest $request
     *
     * @return Response
     */
    public function store(CreatePlanRequest $request)
    {
        $input = $request->all();
        $input['need_follow_up'] = $request->need_follow_up == 'on' ? 1 : 0;

        $plan = $this->planRepository->create($input);

        session()->flash('success', __('site.added_successfully'));

        return redirect(route('plans.index'));
    }

    /**
     * Display the specified Plan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $plan = $this->planRepository->find($id);

        if (empty($plan)) {
            session()->flash('error', __('site.not_found'));

            return redirect(route('plans.index'));
        }

        return view('plans.show')->with('plan', $plan);
    }

    /**
     * Show the form for editing the specified Plan.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $plan = $this->planRepository->find($id);

        if (empty($plan)) {
            session()->flash('error', __('site.not_found'));

            return redirect(route('plans.index'));
        }

        return view('plans.edit')->with('plan', $plan);
    }

    /**
     * Update the specified Plan in storage.
     *
     * @param int $id
     * @param UpdatePlanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePlanRequest $request)
    {
        $plan = $this->planRepository->find($id);

        if (empty($plan)) {
            session()->flash('error', __('site.not_found'));

            return redirect(route('plans.index'));
        }
        $input=$request->all();
        $input['need_follow_up'] = $request->need_follow_up == 'on' ? 1 : 0;

        $plan = $this->planRepository->update($input, $id);

        session()->flash('success', __('site.updated_successfully'));

        return redirect(route('plans.index'));
    }

    /**
     * Remove the specified Plan from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $plan = $this->planRepository->find($id);

        if (empty($plan)) {
            session()->flash('error', __('site.not_found'));

            return redirect(route('plans.index'));
        }

        $this->planRepository->delete($id);

        session()->flash('success', __('site.deleted_successfully'));

        return redirect(route('plans.index'));
    }
}
