@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow p-4">
        <h2 class="mb-4 text-center">Create New Order</h2>

        <form method="POST" action="{{ route('orders.store') }}">
            @csrf

           
            <div class="mb-3">
                <label class="form-label fw-bold">Select User</label>
                <select class="form-select" name="user_id" required>
                    <option value="">-- Select User --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

           
            <div class="table-responsive">
                <table class="table table-bordered align-middle text-center" id="productsTable">
                    <thead class="table-dark">
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
            </div>

          
            <div class="d-flex justify-content-between align-items-center mt-3">
                <button type="button" id="addProduct" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Add Product</button>
                <h4 class="text-success fw-bold">Grand Total: <span id="grandTotal">0</span></h4>
            </div>


            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success px-5">Submit Order</button>
            </div>
        </form>
    </div>
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
            <td><input type="number" name="products[${productIndex}][qty]" class="form-control qty text-center" required></td>
            <td><input type="number" name="products[${productIndex}][amount]" class="form-control amount text-center" required></td>
            <td><input type="number" name="products[${productIndex}][total]" class="form-control total text-center bg-light" readonly></td>
            <td><button type="button" class="btn btn-danger removeProduct"><i class="bi bi-trash"></i>Delete</button></td>
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
        document.getElementById("grandTotal").textContent = grandTotal.toFixed(2);
    }
});
</script>
@endsection
