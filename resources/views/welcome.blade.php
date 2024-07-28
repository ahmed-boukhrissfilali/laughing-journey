@extends('layouts.app')
@section('content')
<div class="container-fluid" style="margin-top: 20px;">
    <p class="dashboard-title">Dashboard</p>
    <div class="row mb-3">
        <div class="col-md-3">
            <div class="info-box bg-info">
                <div class="inner">
                    <h3>{{ $totalProduits }}</h3>
                    <p>Total Products</p>
                    <p class="small-text">+55% since yesterday</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box bg-success">
                <div class="inner">
                    <h3>{{ $produitsApprouves }}</h3>
                    <p>Approved Products</p>
                    <p class="small-text">+3% since last week</p>
                </div>
                <div class="icon">
                    <i class="fas fa-check-circle m"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box bg-danger">
                <div class="inner">
                    <h3>{{ $produitsEnAttente }}</h3>
                    <p>Pending Products</p>
                    <p class="small-text">-2% since last quarter</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
.dashboard-title {
    font-size: 48px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 40px;
    color: #4a4a4a;
    background: linear-gradient(135deg, #f7971e 0%, #ffd200 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: fadeIn 2s ease-in-out;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.info-box {
    width: 250px !important;
    height: 200px;
    border-radius: 10px;
    position: relative;
    padding: 20px;
    color: #fff;
    overflow: hidden;
    margin-bottom: 20px;
    transition: transform 0.3s, box-shadow 0.3s;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.info-box:hover {
    transform: translateY(-10px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.info-box .icon {
    font-size: 40px;
    opacity: 0.8;
}

.info-box .inner {
    display: flex;
    flex-direction: column;
}

.info-box h3 {
    font-size: 28px;
    font-weight: bold;
    margin: 0;
    padding: 0;
}

.info-box p {
    font-size: 16px;
    margin: 0;
    padding: 0;
}

.info-box .small-text {
    font-size: 12px;
    margin-top: 5px;
    color: #d4d4d4;
}

.bg-info {
    background: #00c0ef;
}

.bg-success {
    background: #00a65a;
}

.bg-danger {
    background: #dd4b39;
}

.bg-warning {
    background: #f39c12;
}
</style>
@endpush
