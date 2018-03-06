<?php

namespace App\Http\Controllers;

/*Se hace el llamado al modelo de tipos de documentos */
use App\Models\type_documents;
use App\Models\documents;
use Illuminate\Support\Facades\Auth;

use App\DataTables\documentsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatedocumentsRequest;
use App\Http\Requests\UpdatedocumentsRequest;
use App\Http\Requests\SearchdocumentsRequest;
use App\Repositories\documentsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Yajra\DataTables\Utilities\Request;



class documentsController extends AppBaseController
{
    /** @var  documentsRepository */
    private $documentsRepository;

    public function __construct(documentsRepository $documentsRepo)
    {
        $this->documentsRepository = $documentsRepo;
    }

    /**
     * Display a listing of the documents.
     *
     * @param documentsDataTable $documentsDataTable
     * @return Response
     */
    public function index(documentsDataTable $documentsDataTable)
    {
        $typesDocuments = type_documents::pluck('nombre', 'id');
        return $documentsDataTable->render('documents.index',compact('typesDocuments'));
    }

    /**
     * Show the form for searching the documents.
     *
     * @return Response
     */
    public function search()
    {
        $typesDocuments = type_documents::pluck('nombre', 'id');
        $typesDocuments[""] = "Seleccione un tipo";
        return view('documents.search', compact('typesDocuments'));
    }

     /**
     * Get the documents associated with the filters on the screen
     *
     * @param Request $request
     *
     * @return Response
     */
    public function searchResult(SearchdocumentsRequest $request )
    {
        if($request->get('indice1') == null && $request->get('indice2') == null && $request->get('indice3') == null && $request->get('tipo_documento') == null){
            return response()->json(array('status' => 'error', 'msg' => "Debe ingresar un filtro."));
        }else{
            $documents = $this->documentsRepository->model()::with('type_documents')->with('users')->filtro($request)->get();
        }

        return response()->json(array('status' => 'success', 'result' => $documents));
    }

    /**
     * Show the form for creating a new documents.
     *
     * @return Response
     */
    public function create()
    {
        $typesDocuments = type_documents::pluck('nombre', 'id');
        return view('documents.create',compact('typesDocuments'));
    }

    /**
     * Store a newly created documents in storage.
     *
     * @param CreatedocumentsRequest $request
     *
     * @return Response
     */
    public function store(CreatedocumentsRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        $documents = $this->documentsRepository->create($input);

        $fileName = $documents->id . '.' .
        $request->file('ruta_archivo')->getClientOriginalExtension();

        $request->file('ruta_archivo')->move(
            base_path() . '/public/uploads', $fileName
        );

        Flash::success('Documento guardado con éxito.');

        return redirect(route('documents.index'));
    }

    /**
     * Display the specified documents.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $documents = $this->documentsRepository->findWithoutFail($id);
        //dd($documents);
        if (empty($documents)) {
            Flash::error('Documents not found');

            return redirect(route('documents.index'));
        }

        return view('documents.show')->with('documents', $documents);
    }

    /**
     * Show the form for editing the specified documents.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $documents = $this->documentsRepository->findWithoutFail($id);
        $typesDocuments = type_documents::pluck('nombre', 'id');

        if (empty($documents)) {
            Flash::error('Documents not found');

            return redirect(route('documents.index'));
        }

        return view('documents.edit',compact('typesDocuments'))->with('documents', $documents);
    }

    /**
     * Update the specified documents in storage.
     *
     * @param  int              $id
     * @param UpdatedocumentsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatedocumentsRequest $request)
    {
        $documents = $this->documentsRepository->findWithoutFail($id);

        if (empty($documents)) {
            Flash::error('Documents not found');

            return redirect(route('documents.index'));
        }

        $documents = $this->documentsRepository->update($request->all(), $id);

        Flash::success('Documents updated successfully.');

        return redirect(route('documents.index'));
    }

    /**
     * Remove the specified documents from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $documents = $this->documentsRepository->findWithoutFail($id);

        if (empty($documents)) {
            Flash::error('Documents not found');

            return redirect(route('documents.index'));
        }

        $this->documentsRepository->delete($id);

        Flash::success('Documents deleted successfully.');

        return redirect(route('documents.index'));
    }
}
