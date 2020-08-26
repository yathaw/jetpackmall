<x-backend>

	<!-- main content -->
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1> <i class="icofont-list"></i> Order </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered" id="sampleTable">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> Date </th>
                                        <th> Voucher No </th>
                                        <th> Total </th>
                                        <th> Status </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 1; @endphp
                                    
                                    @foreach($orders as $order)

                                    @php
                                        $id = $order['id'];
                                        $orderdate = $order['orderdate'];
                                        $voucherno = $order['voucherno'];
                                        $total = $order['total'];
                                        $order_status = $order['status']; 
                                        
                                        if ($order_status == 0) {
                                           $status = "Order";
                                        }
                                        elseif ($order_status == 2) {
                                            $status = "Order Cancel";
                                        }       
                                        else{
                                            $status = "Order Confirm";
                                        }
                                    @endphp
                                    <tr>
                                        <td> {{ $i++ }}. </td>
                                        <td> {{ $orderdate }}  </td>
                                        <td> {{ $voucherno }} </td>
                                        <td> {{ number_format($total) }} Ks </td>
                                        <th> {{  $status  }} </th>
                                        <td>
                                            <a href="orderdetail.php?voucherno=<?= $voucherno ?> " class="btn btn-outline-info">
                                                <i class="icofont-info"></i>
                                            </a>
                                            
                                            <?php 
                                                if ($order_status == 0):?>
                                                <a href="orderconfirm.php?id=<?= $id ?> " class="btn btn-outline-success">
                                                    <i class="icofont-ui-check"></i>
                                                </a>

                                                <a href="orderdelete.php?id=<?= $id ?> " class="btn btn-outline-danger">
                                                    <i class="icofont-close"></i>
                                                </a>
                                            <?php endif; ?>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</x-backend>