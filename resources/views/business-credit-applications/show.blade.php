@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1>Business Credit Application #{{ $application->id }}</h1>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('admin.business-credit-applications.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
        </div>
    </div>

    <div class="row">
        <!-- Primary Contact Information -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5>Primary Contact Information</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Contact Person:</th>
                            <td>{{ $application->contact_person ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $application->email ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Mobile:</th>
                            <td>{{ $application->mobile ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Date of Birth:</th>
                            <td>{{ $application->dob ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Driver's License:</th>
                            <td>{{ $application->drivers_licence ?? 'N/A' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Business Information -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5>Business Information</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Trading Name:</th>
                            <td>{{ $application->trading_name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Legal Name:</th>
                            <td>{{ $application->legal_name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Nature of Business:</th>
                            <td>{{ $application->nature_business ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Date of Incorporation:</th>
                            <td>{{ $application->date_incorp ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Application Type:</th>
                            <td><span class="badge bg-info">{{ $application->application_type ?? 'N/A' }}</span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Company Registration -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h5>Company Registration</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Company Number:</th>
                            <td>{{ $application->company_no ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>NZBN:</th>
                            <td>{{ $application->nzbn ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>GST Number:</th>
                            <td>{{ $application->gst_no ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Paid Capital:</th>
                            <td>${{ number_format($application->paid_capital ?? 0, 2) }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Financial Information -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h5>Financial Information</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Monthly Purchases:</th>
                            <td>${{ number_format($application->monthly_purchases ?? 0, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Credit Limit:</th>
                            <td>${{ number_format($application->credit_limit ?? 0, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Bank Branch:</th>
                            <td>{{ $application->bank_branch ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Bank Account:</th>
                            <td>{{ $application->bank_account_no ?? 'N/A' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Address Information -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5>Address Information</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Physical Address:</th>
                            <td>{{ $application->physical_address ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Physical Postcode:</th>
                            <td>{{ $application->postcode_phy ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Billing Address:</th>
                            <td>{{ $application->billing_address ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Billing Postcode:</th>
                            <td>{{ $application->postcode_bill ?? 'N/A' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Accounts Information -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h5>Accounts Information</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Accounts Contact:</th>
                            <td>{{ $application->accounts_contact ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Accounts Email:</th>
                            <td>{{ $application->accounts_email ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Accounts Mobile:</th>
                            <td>{{ $application->accounts_mobile ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Email Required:</th>
                            <td>{{ $application->accounts_email_opt ? 'Yes' : 'No' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Signatory Information -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h5>Signatory Information</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Signed By:</th>
                            <td>{{ $application->signed_client_name ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Position:</th>
                            <td>{{ $application->signed_position ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>Signed Date:</th>
                            <td>{{ $application->signed_date ?? 'N/A' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Other Information -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-light">
                    <h5>Other Information</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Principal Place of Business:</th>
                            <td>{{ $application->principal_place_of_business ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>To Whom:</th>
                            <td>{{ $application->to_whom ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <th>PO Required:</th>
                            <td>{{ $application->po_required ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <th>Created At:</th>
                            <td>{{ $application->created_at?->format('d M Y H:i') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <!-- Directors -->
        @if($application->directors->count() > 0)
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5>Directors ({{ $application->directors->count() }})</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($application->directors as $director)
                                <tr>
                                    <td>{{ $director->name ?? 'N/A' }}</td>
                                    <td>{{ $director->position ?? 'N/A' }}</td>
                                    <td>{{ $director->email ?? 'N/A' }}</td>
                                    <td>{{ $director->mobile ?? 'N/A' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- Guarantors -->
        @if($application->guarantors->count() > 0)
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h5>Guarantors ({{ $application->guarantors->count() }})</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($application->guarantors as $guarantor)
                                <tr>
                                    <td>{{ $guarantor->name ?? 'N/A' }}</td>
                                    <td>{{ $guarantor->email ?? 'N/A' }}</td>
                                    <td>{{ $guarantor->mobile ?? 'N/A' }}</td>
                                    <td>{{ $guarantor->address ?? 'N/A' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <!-- References -->
        @if($application->references->count() > 0)
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h5>References ({{ $application->references->count() }})</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($application->references as $reference)
                                <tr>
                                    <td>{{ $reference->name ?? 'N/A' }}</td>
                                    <td>{{ $reference->phone ?? 'N/A' }}</td>
                                    <td>{{ $reference->email ?? 'N/A' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>

    <!-- Action Buttons -->
    <div class="row mt-4">
        <div class="col-12">
            <a href="{{ route('admin.business-credit-applications.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
            <form action="{{ route('admin.business-credit-applications.destroy', $application->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this application?')">
                    <i class="fas fa-trash"></i> Delete Application
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
