@extends('layouts.app')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <div class="fluid-container">
                            <h1 class="" style="margin-left: 0px;">Data Barang</h1>
                            <button type="button" style="font-size:1rem;margin:10px 0px;" class="btn btn-primary"
                                data-bs-toggle="modal" data-bs-target="#addProduct">
                                Tambah Produk
                            </button>
                            <div class="">
                                <hr style="width:700px;">
                                <div class="" style="display:flex;justify-content:center">
                                    <table style="margin:auto 0px;" id="tabelProduk" class="tableDataProduk">
                                        <tr>
                                            <th style="width: 20px;">
                                                NO
                                            </th>
                                            {{-- <th style="width: 20px;">
                                                Id
                                            </th> --}}
                                            <th>
                                                Nama Barang
                                            </th>
                                            <th>
                                                Jumlah Barang
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                        <?php foreach ($inventories as $key => $value) : ?>
                                        <tr>
                                            <td style="width: 20px;">
                                                {{ $key + 1 }}
                                            </td>
                                            {{-- <td style="width: 20px;">
                                                {{ $value->id }}
                                            </td> --}}
                                            <td>
                                                <?= $value->name ?>
                                            </td>
                                            <td>
                                                <div style="display:flex;justify-content:center;">
                                                    <?= $value->item_count ?>
                                                </div>
                                            </td>
                                            <td style="display:flex;justify-content:center;">
                                                <form action="/delete" style="margin: 0px;">
                                                    <input type="hidden" name="id" value="{{ $value->id }}">
                                                    <button href="" type="submit" class="btn btn-danger">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal addData -->
    <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD PRODUCT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="" action="/input" method="post" runat="server" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Barang</label>
                            <input type="text" required class="form-control" name="name" id="name"
                                placeholder="Input Nama Barang">
                        </div>
                        <div id="inputBnykBarang" class="mb-3">
                            <label for="item_count" class="form-label">Banyak Barang</label>
                            <input type="number" name="item_count" class="form-control" id="item_count"
                                placeholder="Input Banyak Barang">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
