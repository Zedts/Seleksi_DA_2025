@extends('layouts.master')

@section('title', 'Admin Dashboard')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #650096 0%, #8e44ad 100%);
        min-height: 100vh;
        margin: 0;
        padding: 0;
        color: white;
        scroll-behavior: smooth;
    }

    .dashboard-container {
        padding: 20px;
        margin: 0 auto;
        max-width: 1400px;
        position: relative;
    }

    /* Header Section */
    .admin-header {
        text-align: center;
        margin-bottom: 40px;
        padding: 40px 0;
        position: relative;
    }

    .admin-header h1 {
        font-size: 2.8rem;
        font-weight: 700;
        margin-bottom: 15px;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
        background: linear-gradient(45deg, #fff, #f0f0f0);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .admin-header p {
        font-size: 1.2rem;
        font-weight: 300;
        opacity: 0.9;
        margin-bottom: 30px;
    }

    /* Action Section */
    .admin-actions {
        margin-bottom: 40px;
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .btn-add {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        padding: 15px 30px;
        border-radius: 25px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        font-size: 1rem;
        font-weight: 500;
        backdrop-filter: blur(10px);
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
    }

    .btn-add::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
        transition: left 0.8s ease;
    }

    .btn-add:hover::before {
        left: 100%;
    }

    .btn-add:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        border-color: rgba(255, 255, 255, 0.5);
    }

    .btn-add:active {
        transform: translateY(-1px) scale(0.98);
    }

    /* Table Container */
    .table-container {
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(20px);
        border-radius: 25px;
        padding: 30px;
        border: 1px solid rgba(255, 255, 255, 0.25);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        position: relative;
        overflow-x: auto; /* Enable horizontal scrolling */
        -webkit-overflow-scrolling: touch; /* Smooth scrolling on iOS */
        margin-bottom: 40px;
    }

    .table-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #ff6b6b, #ffd93d, #4ecdc4, #44a08d);
        border-radius: 25px 25px 0 0;
    }

    .peserta-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        background: transparent;
    }

    .peserta-table th {
        padding: 20px 15px;
        text-align: left;
        border-bottom: 2px solid rgba(255, 255, 255, 0.2);
        background: rgba(0, 0, 0, 0.15);
        font-weight: 600;
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #fff;
        position: relative;
    }

    .peserta-table th::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
        opacity: 0.6;
    }

    .peserta-table td {
        padding: 18px 15px;
        text-align: left;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
        font-weight: 400;
        position: relative;
    }

    .peserta-table tbody tr {
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .peserta-table tbody tr:hover {
        background: rgba(255, 255, 255, 0.08);
        transform: scale(1.01);
    }

    .peserta-table tbody tr:hover td {
        color: #ffd93d;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 10px;
        justify-content: center;
        align-items: center;
    }

    .action-buttons a {
        padding: 8px 12px;
        border-radius: 10px;
        color: white;
        text-decoration: none;
        font-size: 0.9rem;
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        position: relative;
        overflow: hidden;
    }

    .action-buttons a::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        transition: all 0.3s ease;
        transform: translate(-50%, -50%);
    }

    .action-buttons a:hover::before {
        width: 100px;
        height: 100px;
    }

    .edit-btn {
        background: rgba(52, 152, 219, 0.7);
    }

    .edit-btn:hover {
        background: rgba(52, 152, 219, 0.9);
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 8px 20px rgba(52, 152, 219, 0.3);
    }

    .delete-btn {
        background: rgba(231, 76, 60, 0.7);
    }

    .delete-btn:hover {
        background: rgba(231, 76, 60, 0.9);
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 8px 20px rgba(231, 76, 60, 0.3);
    }

    /* Status Badges */
    .status-badge {
        padding: 6px 12px;
        border-radius: 15px;
        font-size: 0.85rem;
        font-weight: 500;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-lulus {
        background: rgba(46, 204, 113, 0.2);
        color: #2ecc71;
        border: 1px solid rgba(46, 204, 113, 0.3);
    }

    .status-tidak-lulus {
        background: rgba(231, 76, 60, 0.2);
        color: #e74c3c;
        border: 1px solid rgba(231, 76, 60, 0.3);
    }

    /* Score Styling */
    .score-cell {
        font-weight: 600;
        text-align: right; 
        font-family: 'Courier New', monospace; 
        padding-right: 20px !important; 
    }

    .score-high {
        color: #2ecc71;
    }

    .score-medium {
        color: #f39c12;
    }

    .score-low {
        color: #e74c3c;
    }

    /* Modal Styles */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(5px);
        z-index: 1000;
        animation: fadeIn 0.3s ease;
        overflow-y: auto; /* Enable vertical scrolling */
        padding: 20px; /* Add padding to prevent content from touching edges */
    }

    .modal-content {
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(20px);
        margin: 20px auto; /* Changed from 5% to fixed margin */
        padding: 40px;
        border-radius: 25px;
        width: 90%;
        max-width: 600px;
        position: relative;
        border: 1px solid rgba(255, 255, 255, 0.25);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
        animation: slideIn 0.4s ease;
    }

    .modal-content::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #ff6b6b, #ffd93d, #4ecdc4);
        border-radius: 25px 25px 0 0;
    }

    .modal-content h2 {
        margin-bottom: 30px;
        font-size: 1.8rem;
        font-weight: 600;
        text-align: center;
        color: white;
    }

    .form-group {
        margin-bottom: 25px;
        position: relative;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #fff;
        font-size: 0.95rem;
    }

    .form-group input {
        width: 100%;
        padding: 15px 20px;
        border-radius: 15px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        background: rgba(255, 255, 255, 0.1);
        color: white;
        font-size: 1rem;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .form-group input:focus {
        outline: none;
        border-color: rgba(255, 255, 255, 0.5);
        box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
        background: rgba(255, 255, 255, 0.15);
    }

    .form-group input::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    /* Status Selection Styling */
    .form-group select {
        width: 100%;
        padding: 15px 20px;
        border-radius: 15px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        background: rgba(255, 255, 255, 0.1);
        color: white;
        font-size: 1rem;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        cursor: pointer;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 15px center;
        background-size: 16px;
    }

    .form-group select:focus {
        outline: none;
        border-color: rgba(255, 255, 255, 0.5);
        box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
    }

    .form-group select option {
        background-color: #650096;
        color: white;
        padding: 15px;
    }

    .form-group select option[value="Lulus"] {
        color: #2ecc71;
    }

    .form-group select option[value=""] {
        color: #e74c3c;
    }

    .close {
        position: absolute;
        right: 20px;
        top: 20px;
        font-size: 24px;
        cursor: pointer;
        color: rgba(255, 255, 255, 0.7);
        transition: all 0.3s ease;
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
    }

    .close:hover {
        color: white;
        background: rgba(255, 255, 255, 0.2);
        transform: scale(1.1);
    }

    /* Form Submit Button */
    .modal .btn-add {
        position: sticky; /* Make button sticky */
        bottom: 0;
        width: 100%;
        margin-top: 20px;
        padding: 15px;
        font-size: 1.1rem;
        background: linear-gradient(45deg, #4ecdc4, #44a08d);
        z-index: 10;
    }

    .modal .btn-add:hover {
        background: linear-gradient(45deg, #44a08d, #4ecdc4);
    }

    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideIn {
        from { 
            opacity: 0;
            transform: translateY(-50px) scale(0.8);
        }
        to { 
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /* Loading Animation */
    .table-loading {
        text-align: center;
        padding: 40px;
        color: rgba(255, 255, 255, 0.7);
    }

    .spinner {
        border: 3px solid rgba(255, 255, 255, 0.1);
        border-top: 3px solid #fff;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        animation: spin 1s linear infinite;
        margin: 0 auto 20px;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    /* Responsive Design */
    @media (max-width: 1200px) {
        .admin-header h1 {
            font-size: 2.4rem;
        }
        
        .table-container {
            padding: 25px;
        }

        .peserta-table {
            min-width: 1000px; /* Minimum width to prevent squishing */
        }
        
        .score-cell {
            font-size: 0.9rem;
        }
    }

    @media (max-width: 992px) {
        .scroll-hint {
            display: block;
        }

        .table-container {
            margin: 0 -15px;
            padding: 15px;
            border-radius: 15px;
        }

        .peserta-table th,
        .peserta-table td {
            white-space: nowrap; /* Prevent text wrapping */
        }
    }

    @media (max-width: 768px) {
        .dashboard-container {
            padding: 10px;
        }

        .table-container {
            border-radius: 10px;
            margin: 0 -10px;
        }

        .peserta-table th,
        .peserta-table td {
            padding: 10px 8px;
            font-size: 0.85rem;
        }

        .action-buttons a {
            padding: 5px 8px;
        }
    }

    @media (max-width: 480px) {
        .table-container::after {
            content: '';
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            width: 30px;
            background: linear-gradient(to right, transparent, rgba(0,0,0,0.2));
            pointer-events: none;
            opacity: 0.8;
        }
    }

    /* Scrollbar Styling */
    .table-container::-webkit-scrollbar {
        height: 8px;
    }

    .table-container::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 4px;
    }

    .table-container::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.3);
        border-radius: 4px;
    }

    .table-container::-webkit-scrollbar-thumb:hover {
        background: rgba(255, 255, 255, 0.5);
    }

    /* Hover Effects for Table */
    .peserta-table tbody tr {
        position: relative;
    }

    .peserta-table tbody tr::after {
        content: '';
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.05), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
        pointer-events: none;
    }

    .peserta-table tbody tr:hover::after {
        opacity: 1;
    }

    /* Add these styles in your existing CSS section */
    .table-container {
        // ...existing styles...
        position: relative;
        overflow-x: auto; /* Enable horizontal scrolling */
        -webkit-overflow-scrolling: touch; /* Smooth scrolling on iOS */
    }

    /* Add hint for scrollable content */
    .scroll-hint {
        display: none;
        text-align: center;
        padding: 10px;
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.7);
        background: rgba(0, 0, 0, 0.2);
        border-radius: 15px;
        margin-bottom: 15px;
        backdrop-filter: blur(10px);
        animation: fadeInOut 2s infinite;
    }

    @keyframes fadeInOut {
        0%, 100% { opacity: 0.7; }
        50% { opacity: 0.3; }
    }
</style>
@endpush

@section('content')
    <div class="dashboard-container">
        <div class="admin-header" data-aos="fade-down" data-aos-duration="800">
            <h1>Admin Dashboard</h1>
            <p>Kelola Data Peserta Seleksi DA 2025</p>
        </div>

        <div class="admin-actions" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
            <button class="btn-add" onclick="showAddModal()">
                <i class="fas fa-plus"></i> Tambah Peserta Baru
            </button>
        </div>

        <div class="scroll-hint">
            <i class="fas fa-hand-point-right"></i> Geser untuk melihat lebih banyak
        </div>

        <div class="table-container" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
            <table class="peserta-table">
                <thead>
                    <tr>
                        <th><i class="fas fa-user"></i> Nama Lengkap</th>
                        <th><i class="fas fa-comments"></i> Wawancara</th>
                        <th><i class="fas fa-pencil-alt"></i> Tes Tulis</th>
                        <th><i class="fas fa-file-alt"></i> CV</th>
                        <th><i class="fas fa-lightbulb"></i> Visi Misi</th>
                        <th><i class="fas fa-trophy"></i> Total</th>
                        <th><i class="fas fa-check-circle"></i> Status</th>
                        <th><i class="fas fa-cogs"></i> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($peserta as $p)
                    <tr data-aos="fade-up" data-aos-duration="600" data-aos-delay="{{ $loop->index * 100 }}">
                        <td><strong>{{ $p->nama_lengkap }}</strong></td>
                        <td class="score-cell" style="color: {{ $p->wawancara < 22.75 ? '#e74c3c' : '#2ecc71' }}">
                            {{ number_format((float)$p->wawancara, 2, '.', '') }}
                        </td>
                        <td class="score-cell" style="color: {{ $p->tes_tulis < 22.75 ? '#e74c3c' : '#2ecc71' }}">
                            {{ number_format((float)$p->tes_tulis, 2, '.', '') }}
                        </td>
                        <td class="score-cell" style="color: {{ $p->cv < 22.75 ? '#e74c3c' : '#2ecc71' }}">
                            {{ number_format((float)$p->cv, 2, '.', '') }}
                        </td>
                        <td class="score-cell" style="color: {{ $p->visimisi_proker < 22.75 ? '#e74c3c' : '#2ecc71' }}">
                            {{ number_format((float)$p->visimisi_proker, 2, '.', '') }}
                        </td>
                        <td class="score-cell" style="color: {{ (($p->wawancara + $p->tes_tulis + $p->cv + $p->visimisi_proker) / 4) < 22.75 ? '#e74c3c' : '#2ecc71' }}">
                            <strong>{{ number_format((float)(($p->wawancara + $p->tes_tulis + $p->cv + $p->visimisi_proker) / 4), 2, '.', '') }}</strong>
                        </td>
                        <td>
                            <span class="status-badge {{ $p->status_kelulusan == 'Lulus' ? 'status-lulus' : 'status-tidak-lulus' }}">
                                {{ $p->status_kelulusan }}
                            </span>
                        </td>
                        <td class="action-buttons">
                            <a href="#" class="edit-btn" onclick="showEditModal({{ $p->id }})" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="delete-btn" onclick="deletePeserta({{ $p->id }})" title="Hapus Data">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Modal -->
    <div id="addModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('addModal')">&times;</span>
            <h2><i class="fas fa-user-plus"></i> Tambah Peserta Baru</h2>
            <form action="{{ route('peserta.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label><i class="fas fa-user"></i> Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" placeholder="Masukkan nama lengkap" required>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-comments"></i> Nilai Wawancara</label>
                    <input type="number" name="wawancara" placeholder="0-33,75" min="0" max="100" step="0.01" required>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-pencil-alt"></i> Nilai Tes Tulis</label>
                    <input type="number" name="tes_tulis" placeholder="0-33,75" min="0" max="100" step="0.01" required>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-file-alt"></i> Nilai CV</label>
                    <input type="number" name="cv" placeholder="0-33,75" min="0" max="100" step="0.01" required>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-lightbulb"></i> Nilai Visi Misi</label>
                    <input type="number" name="visimisi_proker" placeholder="0-33,75" min="0" max="100" step="0.01" required>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-check-circle"></i> Status Kelulusan</label>
                    <select name="status_kelulusan" required>
                        <option value="Tidak Lulus" style="color: #e74c3c">Tidak Lulus</option>
                        <option value="Lulus" style="color: #2ecc71">Lulus</option>
                    </select>
                </div>
                <button type="submit" class="btn-add">
                    <i class="fas fa-save"></i> Simpan Data
                </button>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('editModal')">&times;</span>
            <h2><i class="fas fa-user-edit"></i> Edit Data Peserta</h2>
            <form id="editForm" action="{{ route('peserta.update', ['id' => ':id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label><i class="fas fa-user"></i> Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="edit_nama_lengkap" placeholder="Masukkan nama lengkap" required>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-comments"></i> Nilai Wawancara</label>
                    <input type="number" name="wawancara" id="edit_wawancara" placeholder="0-33,75" min="0" max="100" step="0.01" required>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-pencil-alt"></i> Nilai Tes Tulis</label>
                    <input type="number" name="tes_tulis" id="edit_tes_tulis" placeholder="0-33,75" min="0" max="100" step="0.01" required>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-file-alt"></i> Nilai CV</label>
                    <input type="number" name="cv" id="edit_cv" placeholder="0-33,75" min="0" max="100" step="0.01" required>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-lightbulb"></i> Nilai Visi Misi</label>
                    <input type="number" name="visimisi_proker" id="edit_visimisi_proker" placeholder="0-33,75" min="0" max="100" step="0.01" required>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-check-circle"></i> Status Kelulusan</label>
                    <select name="status_kelulusan" id="edit_status_kelulusan" required>
                        <option value="Tidak Lulus" style="color: #e74c3c">Tidak Lulus</option>
                        <option value="Lulus" style="color: #2ecc71">Lulus</option>
                    </select>
                </div>
                <button type="submit" class="btn-add">
                    <i class="fas fa-sync-alt"></i> Update Data
                </button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
// Initialize AOS
AOS.init({
    once: true,
    offset: 50,
    easing: 'ease-out-cubic',
    duration: 800
});

function showAddModal() {
    const modal = document.getElementById('addModal');
    document.body.classList.add('modal-open');
    modal.style.display = 'block';
    modal.style.animation = 'fadeIn 0.3s ease';
}

function showEditModal(id) {
    const modal = document.getElementById('editModal');
    document.body.classList.add('modal-open');
    
    // Update form action with correct ID
    const form = document.getElementById('editForm');
    const action = form.action;
    form.action = action.replace(':id', id);

    // Fetch existing data
    fetch(`/peserta/${id}/edit`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('edit_nama_lengkap').value = data.nama_lengkap;
            document.getElementById('edit_wawancara').value = data.wawancara;
            document.getElementById('edit_tes_tulis').value = data.tes_tulis;
            document.getElementById('edit_cv').value = data.cv;
            document.getElementById('edit_visimisi_proker').value = data.visimisi_proker;
            document.getElementById('edit_status_kelulusan').value = data.status_kelulusan;
            
            // Update score colors
            const scoreInputs = ['edit_wawancara', 'edit_tes_tulis', 'edit_cv', 'edit_visimisi_proker'];
            scoreInputs.forEach(inputId => {
                const input = document.getElementById(inputId);
                input.style.color = parseFloat(input.value) < 22.75 ? '#e74c3c' : '#2ecc71';
            });
        })
        .catch(error => console.error('Error:', error));

    modal.style.display = 'block';
    modal.style.animation = 'fadeIn 0.3s ease';
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    document.body.classList.remove('modal-open');
    modal.style.animation = 'fadeOut 0.3s ease';
    setTimeout(() => {
        modal.style.display = 'none';
    }, 300);
}

function deletePeserta(id) {
    // Create custom confirmation dialog with better styling
    if(confirm('⚠️ Apakah Anda yakin ingin menghapus data ini?\n\nData yang dihapus tidak dapat dikembalikan!')) {
        // Show loading state
        const deleteBtn = event.target.closest('a');
        const originalContent = deleteBtn.innerHTML;
        deleteBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
        deleteBtn.style.pointerEvents = 'none';

        fetch(`/peserta/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            }
        })
        .then(response => {
            if(response.ok) {
                // Add success animation
                const row = deleteBtn.closest('tr');
                row.style.animation = 'fadeOut 0.5s ease';
                setTimeout(() => {
                    location.reload();
                }, 500);
            } else {
                throw new Error('Failed to delete');
            }
        })
        .catch(error => {
            // Restore button state on error
            deleteBtn.innerHTML = originalContent;
            deleteBtn.style.pointerEvents = 'auto';
            alert('❌ Gagal menghapus data. Silakan coba lagi.');
        });
    }
}

// Close modal when clicking outside
window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
        const modalId = event.target.id;
        closeModal(modalId);
    }
}

// Add keyboard navigation
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const modals = document.querySelectorAll('.modal');
        modals.forEach(modal => {
            if (modal.style.display === 'block') {
                closeModal(modal.id);
            }
        });
    }
});

// Update the form validation part
document.addEventListener('DOMContentLoaded', function() {
    const forms = document.querySelectorAll('form');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const numberInputs = form.querySelectorAll('input[type="number"]');
            let isValid = true;
            
            numberInputs.forEach(input => {
                const value = parseFloat(input.value);
                if (isNaN(value) || value < 0 || value > 100) {
                    input.style.borderColor = '#e74c3c';
                    input.style.boxShadow = '0 0 0 3px rgba(231, 76, 60, 0.2)';
                    isValid = false;
                } else {
                    input.style.borderColor = 'rgba(255, 255, 255, 0.2)';
                    input.style.boxShadow = 'none';
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('⚠️ Pastikan semua nilai berada dalam rentang 0-33,75 dan merupakan angka yang valid!');
            }
        });
    });

    // Update real-time score color updates
    const scoreInputs = document.querySelectorAll('input[type="number"]');
    scoreInputs.forEach(input => {
        input.addEventListener('input', function() {
            const value = parseFloat(input.value);
            if (isNaN(value) || value < 22.75) {
                input.style.color = '#e74c3c'; 
            } else {
                input.style.color = '#2ecc71';
            }
        });
    });

    // Handle scroll hint
    const tableContainer = document.querySelector('.table-container');
    const scrollHint = document.querySelector('.scroll-hint');
    
    function checkScroll() {
        if (tableContainer.scrollWidth > tableContainer.clientWidth) {
            scrollHint.style.display = 'block';
        } else {
            scrollHint.style.display = 'none';
        }
    }

    // Check on load and resize
    window.addEventListener('load', checkScroll);
    window.addEventListener('resize', checkScroll);

    // Hide hint after first scroll
    tableContainer.addEventListener('scroll', function() {
        scrollHint.style.opacity = '0';
        setTimeout(() => {
            scrollHint.style.display = 'none';
        }, 300);
    }, { once: true });
});
</script>
@endpush