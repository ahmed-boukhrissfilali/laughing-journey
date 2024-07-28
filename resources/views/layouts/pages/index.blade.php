<?php
require_once app_path('Helpers/CurrencyHelper.php');
?>
@extends('layouts.app')

@section('content')

<div class="container-fluid" style="margin-top: 20px; margin-left:70px">
    <div class="row">
        <div class="col-12">
        <form action="{{ route('produit.index') }}" method="GET" class="mb-3">
            <div class="group">
                <svg viewBox="0 0 24 24" aria-hidden="true" class="icon" onclick="clearSearch()">
                    <g>
                        <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
                    </g>
                </svg>
                <input class="input" type="search" name="search" placeholder="Search" value="{{ request()->get('search') }}" />
            </div>
        </form>
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="card-title mb-0 " style="font-size: 1.5rem; color:white;">Liste Des Produits</h3>
                </div>
                <div class="row">
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th>N° </th>
                                <th>IMAGE </th>
                                <th>PRODUCT</th>
                                <th>PRICE</th>
                                <th>STATUS</th>
                                <th>CURRENCY </th>
                                <th>GEO</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produits as $key => $produit)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    @php
                                        $images = is_array($produit->image_produit) ? $produit->image_produit : json_decode($produit->image_produit, true);
                                    @endphp
                                    @if(!empty($images) && isset($images[0]))
                                    <img src="{{ asset('storage/images_produit/' . $images[0]) }}" alt="Product Image" style="width: 60px; height: 60px;">
                                    @else
                                        No Image Available
                                    @endif  
                                </td>
                                <td>{{ $produit->nom_produit }}</td>
                                <td>{{ $produit->prix }}</td>

                                <td>
                                    <div class="status-container">
                                        <span class="status {{ strtolower($produit->statut) }}">{{ $produit->statut }}</span>
                                        <select class="status-select" data-produit-id="{{ $produit->id }}">
                                            <option value="APPROVED" {{ $produit->statut == 'APPROVED' ? 'selected' : '' }}>APPROVED</option>
                                            <option value="PENDING" {{ $produit->statut == 'PENDING' ? 'selected' : '' }}>PENDING</option>
                                            <option value="REJECTED" {{ $produit->statut == 'REJECTED' ? 'selected' : '' }}>REJECTED</option>
                                            <option value="DELIVERED" {{ $produit->statut == 'DELIVERED' ? 'selected' : '' }}>DELIVERED</option>
                                            <option value="DUPLICATED" {{ $produit->statut == 'DUPLICATED' ? 'selected' : '' }}>DUPLICATED</option>
                                        </select>
                                    </div>
                                </td>
                                <td>{{ currencySymbol($produit->devise) }}</td>
                                <td>
                                <img class="flag-icon" id="flag-{{ $produit->id }}" data-country="{{ $produit->geo }}" style="width: 32px; height: 20px;">
                                </td>
                                <td>
                                    <div class="btn-container" style="display:flex;justify-content:center;gap:5px">
                                        <a href="{{ route('produit.show', $produit->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Détails">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('produit.edit', $produit->id) }}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Modifier">
                                            <i class="fas fa-edit"></i> 
                                        </a>
                                        <form id="deleteForm-{{ $produit->id }}" action="{{ route('produit.destroy', $produit->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $produit->id }})" data-toggle="tooltip" data-placement="top" title="Supprimer">
                                                <i class="fas fa-trash"></i> 
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        {{ $produits->links() }}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
