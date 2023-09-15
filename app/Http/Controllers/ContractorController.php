<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContractorRequest;
use App\Http\Requests\UpdateContractorRequest;
use App\Repositories\ContractorRepository;
use App\Http\Controllers\AppBaseController;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Flash;
use Response;

class ContractorController extends AppBaseController
{
    /** @var  ContractorRepository */
    private $contractorRepository;
    use ImageTrait;

    public function __construct(ContractorRepository $contractorRepo)
    {
        $this->contractorRepository = $contractorRepo;
    }

    /**
     * Display a listing of the Contractor.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $contractors = $this->contractorRepository->all();

        return view('contractors.index')
            ->with('contractors', $contractors);
    }

    /**
     * Show the form for creating a new Contractor.
     *
     * @return Response
     */
    public function create()
    {
        return view('contractors.create');
    }

    /**
     * Store a newly created Contractor in storage.
     *
     * @param CreateContractorRequest $request
     *
     * @return Response
     */
    public function store(CreateContractorRequest $request)
    {
        $input = $request->all();
//        dd($input);
        $input['created_by'] = auth()->id();
        if ($request->attachments) {
            $file_name = time() . '.' . $request->attachments->getClientOriginalExtension();

            $file_name= $this->savePDF('uploads/', $request->attachments, $width = 900, $height = 500);
            $input['attachments'] = $file_name;
        }
        $contractor = $this->contractorRepository->create($input);

        Flash::success('Contractor saved successfully.');

        return redirect(route('contractors.index'));
    }

    /**
     * Display the specified Contractor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contractor = $this->contractorRepository->find($id);

        if (empty($contractor)) {
            Flash::error('Contractor not found');

            return redirect(route('contractors.index'));
        }

        return view('contractors.show')->with('supplier', $contractor);
    }

    /**
     * Show the form for editing the specified Contractor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $contractor = $this->contractorRepository->find($id);

        if (empty($contractor)) {
            Flash::error('Contractor not found');

            return redirect(route('contractors.index'));
        }

        return view('contractors.edit')->with('contractor', $contractor);
    }

    /**
     * Update the specified Contractor in storage.
     *
     * @param int $id
     * @param UpdateContractorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContractorRequest $request)
    {
        $contractor = $this->contractorRepository->find($id);

        if (empty($contractor)) {
            Flash::error('Contractor not found');

            return redirect(route('contractors.index'));
        }
        $input=$request->all();
        if ($request->attachments) {
            $file_name = time() . '.' . $request->attachments->getClientOriginalExtension();

            $file_name= $this->savePDF('uploads/', $request->attachments, $width = 900, $height = 500);
            $input['attachments'] = $file_name;
        }
        $contractor = $this->contractorRepository->update($input, $id);

        Flash::success('Contractor updated successfully.');

        return redirect(route('contractors.index'));
    }

    /**
     * Remove the specified Contractor from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        $contractor = $this->contractorRepository->find($id);

        if (empty($contractor)) {
            Flash::error('Contractor not found');

            return redirect(route('contractors.index'));
        }

        $this->contractorRepository->delete($id);

        Flash::success('Contractor deleted successfully.');

        return redirect(route('contractors.index'));
    }
}
