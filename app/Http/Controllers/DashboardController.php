<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaksi;
use App\Models\RefundProduk;
use App\Models\RiwayatProduk;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\VoucherUser;

class DashboardController extends Controller
{
    public function index()
    {
        $pendapatan_voucher = VoucherUser::join('vouchers', 'voucher_users.voucher_id', '=', 'vouchers.id')->sum("vouchers.harga");
        // $pendapatan_transaksi = DetailTransaksi::join('keranjangs', 'detail_transaksis.keranjang_id', '=', 'keranjangs.id')->
        //     whereIn('detail_transaksis.status', ['sukses', 'ditolak'])->
        //     sum("keranjangs.total_harga");
        $pendapatan_transaksi = Transaksi::sum('total_harga');
        $total_pendapatan = ($pendapatan_voucher + $pendapatan_transaksi);

        // pembelianVoucher
        $pembelian_produk_jan = DetailTransaksi::whereMonth('created_at', '01')->count();
        $pembelian_produk_feb = DetailTransaksi::whereMonth('created_at', '02')->count();
        $pembelian_produk_mar = DetailTransaksi::whereMonth('created_at', '03')->count();
        $pembelian_produk_apr = DetailTransaksi::whereMonth('created_at', '04')->count();
        $pembelian_produk_mei = DetailTransaksi::whereMonth('created_at', '05')->count();
        $pembelian_produk_jun = DetailTransaksi::whereMonth('created_at', '06')->count();
        $pembelian_produk_jul = DetailTransaksi::whereMonth('created_at', '07')->count();
        $pembelian_produk_agu = DetailTransaksi::whereMonth('created_at', '08')->count();
        $pembelian_produk_sep = DetailTransaksi::whereMonth('created_at', '09')->count();
        $pembelian_produk_okt = DetailTransaksi::whereMonth('created_at', '10')->count();
        $pembelian_produk_nov = DetailTransaksi::whereMonth('created_at', '11')->count();
        $pembelian_produk_des = DetailTransaksi::whereMonth('created_at', '12')->count();
        //endPembelianVoucher

        // pembelianVoucher
        $pembelian_voucher_jan = VoucherUser::whereMonth('created_at', '01')->count();
        $pembelian_voucher_feb = VoucherUser::whereMonth('created_at', '02')->count();
        $pembelian_voucher_mar = VoucherUser::whereMonth('created_at', '03')->count();
        $pembelian_voucher_apr = VoucherUser::whereMonth('created_at', '04')->count();
        $pembelian_voucher_mei = VoucherUser::whereMonth('created_at', '05')->count();
        $pembelian_voucher_jun = VoucherUser::whereMonth('created_at', '06')->count();
        $pembelian_voucher_jul = VoucherUser::whereMonth('created_at', '07')->count();
        $pembelian_voucher_agu = VoucherUser::whereMonth('created_at', '08')->count();
        $pembelian_voucher_sep = VoucherUser::whereMonth('created_at', '09')->count();
        $pembelian_voucher_okt = VoucherUser::whereMonth('created_at', '10')->count();
        $pembelian_voucher_nov = VoucherUser::whereMonth('created_at', '11')->count();
        $pembelian_voucher_des = VoucherUser::whereMonth('created_at', '12')->count();
        //endPembelianVoucher

        // BarangMasukBulan
        $barang_masuk_bulan_jan = RiwayatProduk::where('type', 'masuk')->whereMonth('created_at', '01')->count();
        $barang_masuk_bulan_feb = RiwayatProduk::where('type', 'masuk')->whereMonth('created_at', '02')->count();
        $barang_masuk_bulan_mar = RiwayatProduk::where('type', 'masuk')->whereMonth('created_at', '03')->count();
        $barang_masuk_bulan_apr = RiwayatProduk::where('type', 'masuk')->whereMonth('created_at', '04')->count();
        $barang_masuk_bulan_mei = RiwayatProduk::where('type', 'masuk')->whereMonth('created_at', '05')->count();
        $barang_masuk_bulan_jun = RiwayatProduk::where('type', 'masuk')->whereMonth('created_at', '06')->count();
        $barang_masuk_bulan_jul = RiwayatProduk::where('type', 'masuk')->whereMonth('created_at', '07')->count();
        $barang_masuk_bulan_agu = RiwayatProduk::where('type', 'masuk')->whereMonth('created_at', '08')->count();
        $barang_masuk_bulan_sep = RiwayatProduk::where('type', 'masuk')->whereMonth('created_at', '09')->count();
        $barang_masuk_bulan_okt = RiwayatProduk::where('type', 'masuk')->whereMonth('created_at', '10')->count();
        $barang_masuk_bulan_nov = RiwayatProduk::where('type', 'masuk')->whereMonth('created_at', '11')->count();
        $barang_masuk_bulan_des = RiwayatProduk::where('type', 'masuk')->whereMonth('created_at', '12')->count();
        // endBarangMasukBulan

        // BarangKeluarBulan
        $barang_keluar_bulan_jan = RiwayatProduk::where('type', 'keluar')->whereMonth('created_at', '01')->count();
        $barang_keluar_bulan_feb = RiwayatProduk::where('type', 'keluar')->whereMonth('created_at', '02')->count();
        $barang_keluar_bulan_mar = RiwayatProduk::where('type', 'keluar')->whereMonth('created_at', '03')->count();
        $barang_keluar_bulan_apr = RiwayatProduk::where('type', 'keluar')->whereMonth('created_at', '04')->count();
        $barang_keluar_bulan_mei = RiwayatProduk::where('type', 'keluar')->whereMonth('created_at', '05')->count();
        $barang_keluar_bulan_jun = RiwayatProduk::where('type', 'keluar')->whereMonth('created_at', '06')->count();
        $barang_keluar_bulan_jul = RiwayatProduk::where('type', 'keluar')->whereMonth('created_at', '07')->count();
        $barang_keluar_bulan_agu = RiwayatProduk::where('type', 'keluar')->whereMonth('created_at', '08')->count();
        $barang_keluar_bulan_sep = RiwayatProduk::where('type', 'keluar')->whereMonth('created_at', '09')->count();
        $barang_keluar_bulan_okt = RiwayatProduk::where('type', 'keluar')->whereMonth('created_at', '10')->count();
        $barang_keluar_bulan_nov = RiwayatProduk::where('type', 'keluar')->whereMonth('created_at', '11')->count();
        $barang_keluar_bulan_des = RiwayatProduk::where('type', 'keluar')->whereMonth('created_at', '12')->count();
        // endBarangKeluarBulan

        // BarangMasuk
        $barang_masuk = RiwayatProduk::where('type', 'masuk')->count();
        // endBarangMasuk

        // BarangKeluar
        $barang_keluar = RiwayatProduk::where('type', 'keluar')->count();
        // endBarangKeluar

        $users = User::where('role', 'costumer')->count();
        $produks = DetailTransaksi::join('keranjangs', 'detail_transaksis.keranjang_id', '=', 'keranjangs.id')->
            sum("keranjangs.jumlah");
        $refunds = RefundProduk::all()->count();

        return view('admin.index', compact(
            'pendapatan_voucher',
            'pendapatan_transaksi',
            'total_pendapatan',
            'pembelian_voucher_jan',
            'pembelian_voucher_feb',
            'pembelian_voucher_mar',
            'pembelian_voucher_apr',
            'pembelian_voucher_mei',
            'pembelian_voucher_jun',
            'pembelian_voucher_jul',
            'pembelian_voucher_agu',
            'pembelian_voucher_sep',
            'pembelian_voucher_okt',
            'pembelian_voucher_nov',
            'pembelian_voucher_des',
            'pembelian_produk_jan',
            'pembelian_produk_feb',
            'pembelian_produk_mar',
            'pembelian_produk_apr',
            'pembelian_produk_mei',
            'pembelian_produk_jun',
            'pembelian_produk_jul',
            'pembelian_produk_agu',
            'pembelian_produk_sep',
            'pembelian_produk_okt',
            'pembelian_produk_nov',
            'pembelian_produk_des',
            'barang_masuk_bulan_jan',
            'barang_masuk_bulan_feb',
            'barang_masuk_bulan_mar',
            'barang_masuk_bulan_apr',
            'barang_masuk_bulan_mei',
            'barang_masuk_bulan_jun',
            'barang_masuk_bulan_jul',
            'barang_masuk_bulan_agu',
            'barang_masuk_bulan_sep',
            'barang_masuk_bulan_okt',
            'barang_masuk_bulan_nov',
            'barang_masuk_bulan_des',
            'barang_keluar_bulan_jan',
            'barang_keluar_bulan_feb',
            'barang_keluar_bulan_mar',
            'barang_keluar_bulan_apr',
            'barang_keluar_bulan_mei',
            'barang_keluar_bulan_jun',
            'barang_keluar_bulan_jul',
            'barang_keluar_bulan_agu',
            'barang_keluar_bulan_sep',
            'barang_keluar_bulan_okt',
            'barang_keluar_bulan_nov',
            'barang_keluar_bulan_des',
            'barang_masuk',
            'barang_keluar',
            'users',
            'produks',
            'refunds'
        ));
    }
}