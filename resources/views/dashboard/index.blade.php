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

                <table id="peopleTable" class="lb-table table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Cliente único</th>
                            <th>Nombre</th>
                            <th>Producto</th>
                            <th>Teléfono</th>
                            <th>Días atraso</th>
                            <th>Saldo total</th>
                            <th>Gestor</th>
                            <th>Gestión</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($people ?? [] as $person)
                            <tr>
                                <td>{{ $person->cliente_unico }}</td>
                                <td>{{ $person->nombre_cte }}</td>
                                <td>{{ $person->producto }}</td>
                                <td>{{ $person->telefono1 }}</td>
                                <td>{{ $person->dias_atraso }}</td>
                                <td>${{ number_format($person->saldo_total, 2) }}</td>
                                <td>{{ $person->gestores }}</td>
                                <td>{{ $person->gestion_desc }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
                                    <div class="lb-empty">
                                        <i class="bi bi-database-x"></i>
                                        <h4>Sin datos que mostrar</h4>
                                        <p>Presiona <strong>Sincronizar</strong> para consultar el microservicio.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if(isset($people) && method_exists($people, 'links'))
                    {{ $people->links() }}
                @endif

            @else

                <!--<div class="lb-empty">
                    <i class="bi bi-database-x"></i>
                    <h4>Sin datos que mostrar</h4>
                    <p>
                        Aún no se ha sincronizado información del despacho.
                        Presiona <strong>Consultar personal</strong> para iniciar el proceso.
                    </p>
                </div>-->

                <table id="peopleTable" class="lb-table table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Cliente único</th>
                            <th>Nombre</th>
                            <th>Producto</th>
                            <th>Teléfono</th>
                            <th>Días atraso</th>
                            <th>Saldo total</th>
                            <th>Gestor</th>
                            <th>Gestión</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($people ?? [] as $person)
                            <tr>
                                <td>{{ $person->cliente_unico }}</td>
                                <td>{{ $person->nombre_cte }}</td>
                                <td>{{ $person->producto }}</td>
                                <td>{{ $person->telefono1 }}</td>
                                <td>{{ $person->dias_atraso }}</td>
                                <td>${{ number_format($person->saldo_total, 2) }}</td>
                                <td>{{ $person->gestores }}</td>
                                <td>{{ $person->gestion_desc }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>0001-000045-987654</td>
                                <td>María López Hernández</td>
                                <td>Crédito personal</td>
                                <td>272 123 4567</td>
                                <td><strong class="text-danger">45</strong></td>
                                <td>$18,450.00</td>
                                <td>Juan Pérez</td>
                                <td><span class="status danger">Sin contacto</span></td>
                            </tr>

                            <tr>
                                <td>0001-000088-456321</td>
                                <td>Carlos Méndez Ruiz</td>
                                <td>Préstamo nómina</td>
                                <td>272 555 8741</td>
                                <td><strong>12</strong></td>
                                <td>$8,200.00</td>
                                <td>Ana Torres</td>
                                <td><span class="status gold">Promesa de pago</span></td>
                            </tr>

                            <tr>
                                <td>0001-000102-741852</td>
                                <td>Alejandra Ramírez</td>
                                <td>Tarjeta crédito</td>
                                <td>272 441 8899</td>
                                <td><strong>0</strong></td>
                                <td>$34,870.00</td>
                                <td>Luis García</td>
                                <td><span class="status success">Convenio activo</span></td>
                            </tr>

                            <tr>
                                <td>0001-000145-963258</td>
                                <td>Fernando Castillo</td>
                                <td>Crédito automotriz</td>
                                <td>272 332 1458</td>
                                <td><strong class="text-danger">78</strong></td>
                                <td>$126,300.00</td>
                                <td>Juan Pérez</td>
                                <td><span class="status danger">Cuenta crítica</span></td>
                            </tr>

                            <tr>
                                <td>0001-000201-159753</td>
                                <td>Sofía Martínez</td>
                                <td>Crédito grupal</td>
                                <td>272 554 1022</td>
                                <td><strong>7</strong></td>
                                <td>$5,900.00</td>
                                <td>Ana Torres</td>
                                <td><span class="status success">Seguimiento</span></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            @endif

        </div>
    </div>

</div>

@endsection
