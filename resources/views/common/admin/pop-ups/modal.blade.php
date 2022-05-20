<!-- Delete Confirm Modal -->
@php
    $route = \Request::route()->action['as'] == "admin.customer.savings";
@endphp
<div id="myModal" class="modal">
    <div class="card modal-content">
        <span class="close">&times;</span>
        <form action="{{ $route ? route('admin.customer.savings.delete') : route('admin.customer.credits.delete') }}" method="post">
            @csrf
        <div class="card-body">
            <h4 class="text-center">Are you sure you want to delete this one?</h4>
            <input type="hidden" name="customer_id" value="" id="customerId">
        </div>
        <button type="submit" class="btn btn-outline-success" id="modal-btn">Yes</button>
        </form>
    </div>
</div>

