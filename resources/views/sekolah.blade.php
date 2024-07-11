@extends('adminlte::page')

@section('title','Data Sekolah')

@section('content_header')
<h1>Data Sekolah</h1>
@stop

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Data Sekolah di Indonesia</h1>
    <button id="fetchData" class="btn btn-primary mb-4">Fetch Data Sekolah</button>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Sekolah</th>
                <th>Alamat</th>
                <th>Kecamatan</th>
                <th>Kabupaten/Kota</th>
                <th>Provinsi</th>
            </tr>
        </thead>
        <tbody id="sekolahData">
        </tbody>
    </table>
</div>
@stop

@section('css')
{{-- Add here extra stylesheets --}}
{{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
<style>
    .loading {
        font-size: 20px;
        font-style: italic;
        color: #999;
        text-align: center;
    }
</style>
@stop

@section('js')
<script src="{{ asset('js/app.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded',
    function() {
        let sekolahData = document.getElementById('sekolahData');
        sekolahData.innerHTML = '<tr><td colspan="4" class="loading">Loading data...</td></tr>';
        
        fetch('/fetch-sekolah')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                sekolahData.innerHTML = '';
                data.dataSekolah.forEach((sekolah, index) => {
                    sekolahData.innerHTML += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${sekolah.sekolah}</td>
                            <td>${sekolah.alamat_jalan}</td>
                            <td>${sekolah.kecamatan}</td>
                            <td>${sekolah.kabupaten_kota}</td>
                            <td>${sekolah.propinsi}</td>
                        </tr>
                    `;
                });
            })
            .catch(error => {
                sekolahData.innerHTML = '<tr><td colspan="4" class="loading">Error loading data</td></tr>';
                console.error('There has been a problem with your fetch operation:', error);
            });
    });
</script>
@stop
