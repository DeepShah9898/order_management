@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('orders.store') }}">
        @csrf
        <div class="form-group">
            <label>Select User</label>
            <select class="form-control" name="user_id">
                <option value="">-- Select User --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <table class="table table-bordered" id="productsTable">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Qty</th>
                    <th>Amount</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>

        <button type="button" id="addProduct" class="btn btn-primary">Add More</button>
        <h3>Grand Total: <span id="grandTotal">0</span></h3>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    let productIndex = 0;
    let grandTotal = 0;

    document.getElementById("addProduct").addEventListener("click", function () {
        let tbody = document.querySelector("#productsTable tbody");

        let row = document.createElement("tr");
        row.innerHTML = `
            <td><input type="text" name="products[${productIndex}][name]" class="form-control" required></td>
            <td><input type="number" name="products[${productIndex}][qty]" class="form-control qty" required></td>
            <td><input type="number" name="products[${productIndex}][amount]" class="form-control amount" required></td>
            <td><input type="number" name="products[${productIndex}][total]" class="form-control total" readonly></td>
            <td><button type="button" class="btn btn-danger removeProduct">Remove</button></td>
        `;

        tbody.appendChild(row);
        productIndex++;

        updateTotals();
    });

    document.addEventListener("input", function (event) {
        if (event.target.classList.contains("qty") || event.target.classList.contains("amount")) {
            let row = event.target.closest("tr");
            let qty = row.querySelector(".qty").value || 0;
            let amount = row.querySelector(".amount").value || 0;
            let total = qty * amount;
            row.querySelector(".total").value = total;
            updateTotals();
        }
    });

    document.addEventListener("click", function (event) {
        if (event.target.classList.contains("removeProduct")) {
            event.target.closest("tr").remove();
            updateTotals();
        }
    });

    function updateTotals() {
        grandTotal = 0;
        document.querySelectorAll(".total").forEach(function (totalField) {
            grandTotal += parseFloat(totalField.value) || 0;
        });
        document.getElementById("grandTotal").textContent = grandTotal;
    }
});
</script>
@endsection
