<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanApplication;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function phoneForm()
    {
        return view('phone');
    }

    public function phoneSubmit(Request $request)
    {
        $data = $request->validate([
            'mobile' => 'required|string|max:20',
            'agreed' => 'sometimes|accepted',
        ]);

        $application = LoanApplication::create([
            'mobile' => $data['mobile'],
            'agreed' => isset($data['agreed']) ? true : false,
        ]);

        session(['application_id' => $application->id]);

        return redirect()->route('application.personal');
    }

    public function personalForm()
    {
        $application = $this->getApplicationFromSession();
        return view('presonal', compact('application'));
    }

    public function personalSubmit(Request $request)
    {
        $application = $this->getApplicationFromSession();


        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'gender' => 'required|string',
            'pan' => 'required|string|max:10',
            'dob' => 'nullable|date',
            'dob_day' => 'nullable|numeric',
            'dob_month' => 'nullable|numeric',
            'dob_year' => 'nullable|numeric',
            'pincode' => 'required|string|max:6',
            'income' => 'required|string',
            'occupation' => 'required|string',
        ]);

        // Build dob if split fields provided
        if (empty($validated['dob']) && isset($validated['dob_day'], $validated['dob_month'], $validated['dob_year'])) {
            $day = str_pad($validated['dob_day'], 2, '0', STR_PAD_LEFT);
            $month = str_pad($validated['dob_month'], 2, '0', STR_PAD_LEFT);
            $year = $validated['dob_year'];
            $validated['dob'] = "{$year}-{$month}-{$day}";
        }

        $update = [
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'gender' => $validated['gender'],
            'pan' => $validated['pan'],
            'dob' => $validated['dob'] ?? null,
            'pincode' => $validated['pincode'],
            'income' => $validated['income'],
            'occupation' => $validated['occupation'],
        ];

        $application->update($update);

        return redirect()->route('application.professional');
    }

    public function professionalForm()
    {
        $application = $this->getApplicationFromSession();
        return view('professional', compact('application'));
    }

    public function professionalSubmit(Request $request)
    {
        $application = $this->getApplicationFromSession();

        $data = $request->validate([
            'company_type' => 'required|string',
            'loan_purpose' => 'required|string',
            'ownership' => 'required|string',
        ]);

        $application->update($data);

        return redirect()->route('application.statement');
    }

    public function statementForm()
    {
        $application = $this->getApplicationFromSession();
        return view('statement', compact('application'));
    }

    public function statementSubmit(Request $request)
    {
        $application = $this->getApplicationFromSession();

        $data = $request->validate([
            'statement' => 'required|file|mimes:pdf|max:5120',
        ]);

        $path = $request->file('statement')->store('statements', 'public');

        $application->update(['statement_path' => $path]);

        return redirect()->route('application.offers');
    }

    public function offers()
    {
        $application = $this->getApplicationFromSession();
        return view('offers', compact('application'));
    }

    protected function getApplicationFromSession()
    {
        $id = session('application_id');
        if (! $id) {
            return redirect()->route('application.phone');
        }

        return LoanApplication::findOrFail($id);
    }
}
