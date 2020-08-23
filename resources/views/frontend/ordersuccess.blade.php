<x-frontend>

	<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg subtitle">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2> Order Received </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <section class="product-details spad">
        <div class="container">
            <div class="row justify-content-center">
				<div class="col-10 shadow p-3 mb-5 bg-white rounded">
					<div class="row">
						<div class="col-4">
							<img src="{{ asset('success-tick-dribbble.gif') }}" class="img-fluid">
						</div>
						<div class="col-8 pt-5">
							<h2> Your order is complete </h2>
							<p class="mt-3"> You order will be delivered in 4 days. </p>
						</div>
					</div>
				</div>
			</div>
        </div>
    </section>

</x-frontend>