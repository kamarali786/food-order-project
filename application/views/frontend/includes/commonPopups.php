<!-- Add To Cart Product Modal -->
<div class="modal fade show" id="addToCartModel" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded shadow">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="fas fa-cart-plus"></i> Product Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="add-to-cart-model-body-main">
                    <!-- Data Append Dynamic -->
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times-circle"></i> Close
                </button>
                <a type="button" class="btn btn-success" onclick="addToCartProduct()">
                    <i class="fas fa-cart-arrow-down"></i> Add to Cart
                </a>
            </div>
        </div>
    </div>
</div>