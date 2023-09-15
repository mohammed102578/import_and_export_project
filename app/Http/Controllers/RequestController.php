<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequestRequest;
use App\Http\Requests\UpdateRequestRequest;
use App\Models\Item;
use App\Models\Request;
use App\Repositories\RequestRepository;
use App\Http\Controllers\AppBaseController;
use Flash;
use Response;

class RequestController extends AppBaseController
{
    /** @var  RequestRepository */
    private $requestRepository;

    public function __construct(RequestRepository $requestRepo)
    {
        $this->requestRepository = $requestRepo;
    }

    /** 
     * Display a listing of the Request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index($category_id)
    {

      

        $requests =Request::where('category_id',$category_id)->where('deleted_at',null)->get();
        
        $requests_del =Request::where('category_id',$category_id)->onlyTrashed()->get();
        
        
        return view('requests.index')
            ->with(['requests'=> $requests,'category_id'=>$category_id, 'requests_del'=> $requests_del]);
    }
    /**
     * Display a listing of the Request.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function print($category_id)
    {
        $requests =Request::where('category_id',$category_id)->where('deleted_at',null)->get();
        
        $requests_del =Request::where('category_id',$category_id)->onlyTrashed()->get();
        
        
        return view('requests.print')
            ->with(['requests'=> $requests,'category_id'=>$category_id, 'requests_del'=> $requests_del]);
    }
    /**
     * Show the form for creating a new Request.
     *
     * @return Response
     */
    public function create($category_id)
    {
        
        return view('requests.create',compact('category_id'));
    }

    /**
     * Store a newly created Request in storage.
     *
     * @param CreateRequestRequest $request
     *
     * @return Response
     */
    public function store(CreateRequestRequest $request,$category_id)
    {	

       // return $request->all();
		//dd("==============");
        
        if($category_id != 2){
            $input = $request->except('items');

        }else{
            $input = $request->except('terms_code');

        }
		//dd(\request()->all());
        $input['created_by']=auth()->id();
        $request = $this->requestRepository->create($input);
		//dd($request->items[0]['id']);
		if($category_id != 2){
        foreach (\request()->items as $item){
            $item['request_id']=$request->id;
            Item::create($item);
        }
		}
        Flash::success('Request saved successfully.');

        return redirect(route('requests.index',$category_id));
    }

    /**
     * Display the specified Request.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($category_id,$id)
    {
        $request = $this->requestRepository->find($id);

        if (empty($request)) {
            Flash::error('Request not found');

            return redirect(route('requests.index'));
        }

        return view('requests.show')->with(['request'=> $request,'category_id'=>$category_id]);
    }

    /**
     * Show the form for editing the specified Request.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($category_id,$id)
    {
        $request = $this->requestRepository->find($id);

        if (empty($request)) {
            Flash::error('Request not found');

            return redirect(route('requests.index'));
        }

        return view('requests.edit')->with(['request'=> $request,'category_id'=>$category_id]);
    }

    /**
     * Update the specified Request in storage.
     *
     * @param int $id
     * @param UpdateRequestRequest $request
     *
     * @return Response
     */
    public function update($category_id,$id, UpdateRequestRequest $request)
    {
        $request_model = $this->requestRepository->find($id);

        if (empty($request_model)) {
            Flash::error('Request not found');

            return redirect(route('requests.index',$category_id));
        }
        $input = $request->except('items');
//        dd($request->items[0]['id']);
        foreach ($request->items as $item){
            Item::where('id',$item['id'])->update($item);
        }
        $request_model = $this->requestRepository->update($input, $id);

        Flash::success('Request updated successfully.');

        return redirect(route('requests.index',$category_id));
    }

    /**
     * Remove the specified Request from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($category_id,$id)
    {
        $request = $this->requestRepository->find($id);

        if (empty($request)) {
            Flash::error('Request not found');

            return redirect(route('requests.index',$category_id));
        }

        $this->requestRepository->delete($id);

        Flash::success('Request deleted successfully.');

        return redirect(route('requests.index',$category_id));
    }
}
