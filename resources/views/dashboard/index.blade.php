@extends('layouts.guest')

@section('content')

    <div class="dashboard-page">

        <!-- HEADER -->
        <div class="dashboard-header">

            <div>
                <span class="dashboard-badge">Panel administrativo</span>

                <h1>Dashboard de cobranza</h1>

                <p>
                    Resumen general de cartera, recuperación y actividad reciente.
                </p>
            </div>

            <a href="#" class="lb-btn lb-btn-primary">
                Nuevo crédito
            </a>

        </div>

        <!-- KPIS -->
        <div class="dashboard-grid">

            <div class="dashboard-card kpi-card">
                <div class="kpi-icon">
                    <i class="bi bi-wallet2"></i>
                </div>

                <div>
                    <span>Cartera activa</span>
                    <h3>$1,250,000</h3>
                    <p class="positive">+12% este mes</p>
                </div>
            </div>

            <div class="dashboard-card kpi-card">
                <div class="kpi-icon gold">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>

                <div>
                    <span>Recuperación</span>
                    <h3>86%</h3>
                    <p class="positive">+8% vs periodo anterior</p>
                </div>
            </div>

            <div class="dashboard-card kpi-card">
                <div class="kpi-icon danger">
                    <i class="bi bi-exclamation-triangle"></i>
                </div>

                <div>
                    <span>Cartera vencida</span>
                    <h3>$320,500</h3>
                    <p class="negative">18 cuentas críticas</p>
                </div>
            </div>

            <div class="dashboard-card kpi-card">
                <div class="kpi-icon">
                    <i class="bi bi-people"></i>
                </div>

                <div>
                    <span>Clientes activos</span>
                    <h3>1,248</h3>
                    <p class="positive">+42 nuevos</p>
                </div>
            </div>

        </div>

        <!-- MAIN CONTENT -->
        <div class="dashboard-layout">

            <!-- CHART CARD -->
            <div class="dashboard-card chart-card">

                <div class="card-header-row">
                    <div>
                        <h3>Recuperación mensual</h3>
                        <p>Comportamiento de recuperación de cartera</p>
                    </div>

                    <span class="lb-badge">2026</span>
                </div>

                <div class="fake-chart">
                    <span style="height: 42%"></span>
                    <span style="height: 68%"></span>
                    <span style="height: 54%"></span>
                    <span style="height: 82%"></span>
                    <span style="height: 74%"></span>
                    <span style="height: 90%"></span>
                    <span style="height: 63%"></span>
                </div>

            </div>

            <!-- ACTIVITY -->
            <div class="dashboard-card activity-card">

                <div class="card-header-row">
                    <div>
                        <h3>Actividad reciente</h3>
                        <p>Últimos movimientos registrados</p>
                    </div>
                </div>

                <div class="activity-list">

                    <div class="activity-item">
                        <span></span>
                        <div>
                            <strong>Pago registrado</strong>
                            <p>Cliente: José Ramírez · $4,500</p>
                        </div>
                    </div>

                    <div class="activity-item">
                        <span class="gold"></span>
                        <div>
                            <strong>Convenio actualizado</strong>
                            <p>Crédito empresarial en seguimiento</p>
                        </div>
                    </div>

                    <div class="activity-item">
                        <span class="danger"></span>
                        <div>
                            <strong>Cuenta vencida</strong>
                            <p>Se marcó como prioridad alta</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- TABLE -->
        <div class="dashboard-card table-card">

            <div class="card-header-row">
                <div>
                    <h3>Cuentas prioritarias</h3>
                    <p>Créditos que requieren seguimiento inmediato</p>
                </div>

                <a href="#" class="lb-btn lb-btn-outline">
                    Ver todos
                </a>
            </div>

            <div class="table-responsive">
                <table class="lb-table">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Crédito</th>
                            <th>Saldo</th>
                            <th>Estado</th>
                            <th>Gestor</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>María López</td>
                            <td>CR-10024</td>
                            <td>$18,400</td>
                            <td><span class="status danger">Vencido</span></td>
                            <td>Admin</td>
                        </tr>

                        <tr>
                            <td>Carlos Méndez</td>
                            <td>CR-10031</td>
                            <td>$9,850</td>
                            <td><span class="status gold">Seguimiento</span></td>
                            <td>Admin</td>
                        </tr>

                        <tr>
                            <td>Ana Torres</td>
                            <td>CR-10045</td>
                            <td>$22,100</td>
                            <td><span class="status success">Convenio</span></td>
                            <td>Admin</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>

@endsection
