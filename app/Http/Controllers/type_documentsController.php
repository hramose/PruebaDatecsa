<?php

namespace App\Http\Controllers;

use App\DataTables\type_documentsDataTable;
use App\Http\Requests;
use App\Http\Requests\Createtype_documentsRequest;
use App\Http\Requests\Updatetype_documentsRequest;
use App\Repositories\type_documentsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class type_documentsController extends AppBaseController
{
    /** @var  type_documentsRepository */
    private $typeDocumentsRepository;

    public function __construct(type_documentsRepository $typeDocumentsRepo)
    {
        $this->typeDocumentsRepository = $typeDocumentsRepo;
    }

    /**
     * Display a listing of the type_documents.
     *
     * @param type_documentsDataTable $typeDocumentsDataTable
     * @return Response
     */
    public function index(type_documentsDataTable $typeDocumentsDataTable)
    {
        return $typeDocumentsDataTable->render('type_documents.index');
    }

    /**
     * Show the form for creating a new type_documents.
     *
     * @return Response
     */
    public function create()
    {
        return view('type_documents.create');
    }

    /**
     * Store a newly created type_documents in storage.
     *
     * @param Createtype_documentsRequest $request
     *
     * @return Response
     */
    public function store(Createtype_documentsRequest $request)
    {
        $input = $request->all();

        $typeDocuments = $this->typeDocumentsRepository->create($input);

        Flash::success('Type Documents saved successfully.');

        return redirect(route('typeDocuments.index'));
    }

    /**
     * Display the specified type_documents.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $typeDocuments = $this->typeDocumentsRepository->findWithoutFail($id);

        if (empty($typeDocuments)) {
            Flash::error('Type Documents not found');

            return redirect(route('typeDocuments.index'));
        }

        return view('type_documents.show')->with('typeDocuments', $typeDocuments);
    }

    /**
     * Show the form for editing the specified type_documents.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $typeDocuments = $this->typeDocumentsRepository->findWithoutFail($id);

        if (empty($typeDocuments)) {
            Flash::error('Type Documents not found');

            return redirect(route('typeDocuments.index'));
        }

        return view('type_documents.edit')->with('typeDocuments', $typeDocuments);
    }

    /**
     * Update the specified type_documents in storage.
     *
     * @param  int              $id
     * @param Updatetype_documentsRequest $request
     *
     * @return Response
     */
    public function update($id, Updatetype_documentsRequest $request)
    {
        $typeDocuments = $this->typeDocumentsRepository->findWithoutFail($id);

        if (empty($typeDocuments)) {
            Flash::error('Type Documents not found');

            return redirect(route('typeDocuments.index'));
        }

        $typeDocuments = $this->typeDocumentsRepository->update($request->all(), $id);

        Flash::success('Type Documents updated successfully.');

        return redirect(route('typeDocuments.index'));
    }

    /**
     * Remove the specified type_documents from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $typeDocuments = $this->typeDocumentsRepository->findWithoutFail($id);

        if (empty($typeDocuments)) {
            Flash::error('Type Documents not found');

            return redirect(route('typeDocuments.index'));
        }

        $this->typeDocumentsRepository->delete($id);

        Flash::success('Type Documents deleted successfully.');

        return redirect(route('typeDocuments.index'));
    }
}
