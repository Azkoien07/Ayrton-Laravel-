<?php

namespace App\Http\Controllers;

use App\Models\Pqr;
use Illuminate\Http\Request;
use Mckenziearts\Notify\Facades\Notify;
use Barryvdh\DomPDF\Facade\Pdf;
class PqrController extends Controller
{
    public function index(Request $request)
    {
        $query = Pqr::query()->orderBy('created_at', 'desc');

        // Aplicar filtros
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('id', 'like', "%{$searchTerm}%")
                    ->orWhere('title', 'like', "%{$searchTerm}%")
                    ->orWhere('description', 'like', "%{$searchTerm}%");
            });
        }

        if ($request->has('type_pqr') && !empty($request->type_pqr)) {
            $query->where('type_pqr', $request->type_pqr);
        }

        if ($request->has('status') && !empty($request->status)) {
            $query->where('status', $request->status);
        }

        $pqrs = $query->paginate(10);

        $stats = [
            'total' => Pqr::count(),
            'pending' => Pqr::where('status', 'Pendiente')->count(),
            'in_progress' => Pqr::where('status', 'En Proceso')->count(),
            'resolved' => Pqr::where('status', 'Resuelto')->count(),
            'closed' => Pqr::where('status', 'Cerrado')->count(),
        ];

        return view('admin.pqrs', compact('pqrs', 'stats'));
    }


    public function archive(Request $request)
    {
        $request->validate(['id' => 'required|exists:pqrs,id']);

        $pqr = Pqr::findOrFail($request->id);
        $pqr->update(['status' => 'Cerrado']);

        return response()->json([
            'success' => true,
            'message' => 'PQRS archivado correctamente',
            'stats' => $this->getUpdatedStats()
        ]);
    }
    public function destroy($id)
    {
        Pqr::findOrFail($id)->delete();
    
        return redirect()->back()->with('success', 'PQRS eliminado correctamente');
    }
    protected function getUpdatedStats()
    {
        return [
            'total' => Pqr::count(),
            'pending' => Pqr::where('status', 'Pendiente')->count(),
            'in_progress' => Pqr::where('status', 'En Proceso')->count(),
            'resolved' => Pqr::where('status', 'Resuelto')->count(),
            'closed' => Pqr::where('status', 'Cerrado')->count(),
        ];
    }

    public function create()
    {
        return view('pqrs.pqrs');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'type_pqr' => 'required|in:Queja,Sugerencia,Duda',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'argument' => 'required|string',

        ]);


        $pqr = new \App\Models\Pqr();
        $pqr->type_pqr = $validated['type_pqr'];
        $pqr->title = $validated['title'];
        $pqr->description = $validated['description'];
        $pqr->argument = $validated['argument'];

        $pqr->answer = '';
        $pqr->status = 'Pendiente';

        $pqr->save();

        Notify()->success('Hemos registrado tu PQRS con éxito. Nuestro equipo revisará tu solicitud y te responderá pronto.');
        return redirect()->route('pqrs.pqrs');
    }
    public function updateStatus(Request $request, $id)
{
    $pqr = Pqr::findOrFail($id);
    $pqr->status = $request->input('status');
    $pqr->save();

    return back()->with('success', 'Estado actualizado correctamente.');
}


public function exportPdf(Request $request)
{
    $pqrs = Pqr::all(); 

    $pdf = Pdf::loadView('admin.pdf.pqrs', compact('pqrs'));
    return $pdf->download('pqrs_estado.pdf');
}
}
