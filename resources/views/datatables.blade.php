@extends('app')
@section('datatables')
    <h2 class="mb-5">Product Records</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#product-modal">Create new product</button>
    <div class="table-responsive">
        <table class="table custom-table">
        <thead>
            <tr> 
                <th scope="col">Product Image</th>
                <th scope="col">Product name</th>
                <th scope="col">Date of expiry</th>
                <th scope="col">Price</th>
                <th scope="col">Unit</th>
                <th scope="col">Avail Inven.</th> 
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6" >
                    <div class="d-flex flex-row justify-content-center">
                        No record found.
                    </div>
                </td>
            </tr>
            {{-- <tr> 
                <td class="p-0">
                    <div class="d-flex flex-column  ">
                        <img class="rounded" style="width:100px;height:100px;" src="{{asset('assets/images/yakult.jpg')}}"/>
                    </div>
                </td>
                <td class="align-self-end">
                    <div class="text-wrap">
                        Yakult Probiotics
                    </div>
                </td>
                <td>January 30,2024</td>
                <td>₱50.00</td>
                <td>Packs</td>
                <td>1</td> 
            </tr>  --}}
        </tbody>
        </table>
    </div>
    @include('modal')
@endsection