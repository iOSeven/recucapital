@extends('layouts.guest')

@section('content')

<div class="dashboard-page">

    <div class="dashboard-header">
        <div>
            <span class="dashboard-badge">Panel administrativo</span>
            <h1>Dashboard de cobranza</h1>
            <p>Consulta, sincroniza y analiza la información del personal y cartera.</p>
        </div>
    </div>

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

    <div class="dashboard-layout">

        <div class="dashboard-card chart-card">
            <div class="card-header-row">
                <div>
                    <h3>Recuperación mensual</h3>
                    <p>Comportamiento de recuperación de cartera.</p>
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

        <div class="dashboard-card activity-card">
            <div class="card-header-row">
                <div>
                    <h3>Actividad reciente</h3>
                    <p>Últimos movimientos registrados.</p>
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

    <div class="dashboard-card table-card">
        <div class="card-header-row">

            <div>
                <h3>Listado de personal</h3>
                <p>Información obtenida desde el microservicio del despacho.</p>
            </div>

            <div class="table-actions">

                <form method="POST" action="#">
                    @csrf

                    <button type="submit" class="lb-btn lb-btn-primary">
                        <i class="bi bi-arrow-repeat"></i>
                        Sincronizar
                    </button>

                </form>

                <a href="#" class="lb-btn lb-btn-outline">

                    <i class="bi bi-file-earmark-excel"></i>

                    Excel

                </a>

            </div>

        </div>

        <div class="table-responsive">

            @if(isset($people) && $people->count())

                <table class="lb-table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Crédito</th>
                            <th>Saldo</th>
                            <th>Estado</th>
                            <th>Gestor</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($people as $person)
                            <tr>
                                <td>{{ $person->name ?? 'Sin nombre' }}</td>
                                <td>{{ $person->credit ?? 'N/A' }}</td>
                                <td>{{ $person->amount ?? 'N/A' }}</td>
                                <td>{{ $person->status ?? 'N/A' }}</td>
                                <td>{{ $person->manager ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="dashboard-pagination">
                    {{ $people->links() }}
                </div>

            @else

                <div class="lb-empty">
                    <i class="bi bi-database-x"></i>
                    <h4>Sin datos que mostrar</h4>
                    <p>
                        Aún no se ha sincronizado información del despacho.
                        Presiona <strong>Consultar personal</strong> para iniciar el proceso.
                    </p>
                </div>

            @endif

        </div>
    </div>

</div>

@endsection
