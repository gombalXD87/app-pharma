<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});


Route::get('/categorias', function () {

    $categorias = json_decode(json_encode([
        ["codigo" => "A02", "categoria" => "Medicamentos para el tratamiento de Trastornos causados por Ácidos"],
        ["codigo" => "A03", "categoria" => "Medicamentos contra Trastornos Funcionales Gastrointestinales"],
        ["codigo" => "A04", "categoria" => "Medicamentos Antieméticos y Antinauseosos"],
        ["codigo" => "A06", "categoria" => "Medicamentos para el Estreñimiento"],
        ["codigo" => "A07", "categoria" => "Medicamentos Antidiarreicos, Antiinflamatorios y Antiinfecciosos Intestinales"],
        ["codigo" => "A10", "categoria" => "Medicamentos usados en Diabetes"],
        ["codigo" => "A11", "categoria" => "Vitaminas"],
        ["codigo" => "A12", "categoria" => "Suplementos Minerales"],
    ]));

    $html = "<h1>Categorías</h1>";
    $html .= "<table border='1' cellpadding='8' cellspacing='0'>";
    $html .= "<tr><th>Código</th><th>Categoría</th></tr>";

    foreach ($categorias as $cat) {
        $html .= "<tr><td>$cat->codigo</td><td>$cat->categoria</td></tr>";
    }

    $html .= "</table>";

    return $html;
});

Route::get('/medicamentos', function () {

    $medicamentos = json_decode(json_encode([
        ["codigo" => "A02BA02", "no" => 1, "nombre" => "Ranitidina", "dosis" => "50 mg", "forma" => "Líquidos parenterales", "via" => "IM/IV"],
        ["codigo" => "A02BA03", "no" => 2, "nombre" => "Famotidina", "dosis" => "40 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A02BC01", "no" => 3, "nombre" => "Omeprazol", "dosis" => "20 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A02BC01", "no" => 4, "nombre" => "Omeprazol", "dosis" => "40 mg", "forma" => "Sólidos parenterales", "via" => "IV"],
        ["codigo" => "A03BA01", "no" => 1, "nombre" => "Atropina (Sulfato)", "dosis" => "0.5–1 mg/mL", "forma" => "Líquidos parenterales", "via" => "SC/IM/IV"],
        ["codigo" => "A03BA03", "no" => 2, "nombre" => "Hiosciamina (bromuro de n-butil hioscina)", "dosis" => "10 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A03BA03", "no" => 3, "nombre" => "Hiosciamina (bromuro de n-butil hioscina)", "dosis" => "20 mg/mL", "forma" => "Líquidos parenterales", "via" => "IM/IV"],
        ["codigo" => "A03FA01", "no" => 4, "nombre" => "Metoclopramida (clorhidrato)", "dosis" => "5 mg/mL", "forma" => "Líquidos parenterales", "via" => "IM/IV"],
        ["codigo" => "A03FA01", "no" => 5, "nombre" => "Metoclopramida (clorhidrato)", "dosis" => "10 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A04AA01", "no" => 1, "nombre" => "Ondansetron", "dosis" => "8 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A04AA01", "no" => 2, "nombre" => "Ondansetron", "dosis" => "2 mg/mL", "forma" => "Líquidos parenterales", "via" => "IV"],
        ["codigo" => "A04AA02", "no" => 3, "nombre" => "Granisetron", "dosis" => "1 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "A04AA02", "no" => 4, "nombre" => "Granisetron", "dosis" => "1 mg/mL", "forma" => "Líquidos parenterales", "via" => "IV"],
        ["codigo" => "R06AA11", "no" => 5, "nombre" => "Dimenhidrinato", "dosis" => "50 mg", "forma" => "Sólidos orales", "via" => "VO"],
        ["codigo" => "R06AA11", "no" => 6, "nombre" => "Dimenhidrinato", "dosis" => "50 mg/mL", "forma" => "Líquidos parenterales", "via" => "IM/IV"],
    ]));

    $html = "<h1>Medicamentos</h1>";
    $html .= "<table border='1' cellpadding='8' cellspacing='0'>";
    $html .= "<tr>
                <th>Código</th>
                <th>Nº</th>
                <th>Nombre</th>
                <th>Dosis</th>
                <th>Forma farmacéutica</th>
                <th>Vía de administración</th>
              </tr>";

    foreach ($medicamentos as $med) {
        $html .= "<tr>
                    <td>$med->codigo</td>
                    <td>$med->no</td>
                    <td>$med->nombre</td>
                    <td>$med->dosis</td>
                    <td>$med->forma</td>
                    <td>$med->via</td>
                  </tr>";
    }

    $html .= "</table>";

    return $html;
});

Route::get('/clientes/vip', function () {

    $clientes = [
        (object)[ 'id' => 1, 'nombre' => 'Karen Criollo', 'telefono' => '+503 1234 5678', 'puntos_acumulados' => '15' ],
        (object)[ 'id' => 2, 'nombre' => 'Joel', 'telefono' => '+503 8765 4321', 'puntos_acumulados' => '5'],
        (object)[ 'id' => 3, 'nombre' => 'Cristofer Guevara', 'telefono' => '+503 5555 5555', 'puntos_acumulados' => '25']
    ];


    $html = '
            <table border="1" cellspacing="0">
                <thead>
                <tr>
                    <th>ID Cliente</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Puntos Acumulados</th>
                </tr>
                </thead>
                <tbody>
                
    ';
    foreach ($clientes as $cliente) {
        $html .= "
                <tr>
                    <td>$cliente->id</td>
                    <td>$cliente->nombre</td>
                    <td>$cliente->telefono</td>
                    <td>$cliente->puntos_acumulados</td>
                </tr>
        ";
    }

    $html .= '
                </tbody>
            </table>
    ';
    
    echo $html;
});


Route::get('/proveedores/internacionales', function () {

    $proveedores = [
        (object)[ 'empresa' => 'PharmaGlobal S.A.', 'pais_origen' => 'México', 'medicamento_principal' => 'Omeprazol', 'tiempo_entrega_dias' => 10 ],
        (object)[ 'empresa' => 'MedSupply Corp', 'pais_origen' => 'Estados Unidos', 'medicamento_principal' => 'Ondansetron', 'tiempo_entrega_dias' => 22 ],
        (object)[ 'empresa' => 'Farmacéutica del Sur', 'pais_origen' => 'Colombia', 'medicamento_principal' => 'Metoclopramida', 'tiempo_entrega_dias' => 18 ],
        (object)[ 'empresa' => 'AsiaMed Trading', 'pais_origen' => 'India', 'medicamento_principal' => 'Granisetron', 'tiempo_entrega_dias' => 7 ]
    ];


    $html = '
            <table border="1" cellspacing="0">
                <thead>
                <tr>
                    <th>Empresa</th>
                    <th>País de Origen</th>
                    <th>Medicamento Principal</th>
                    <th>Tiempo de Entrega (días)</th>
                </tr>
                </thead>
                <tbody>
                
    ';

    foreach ($proveedores as $proveedor) {

        $advertencia = '';
        if ($proveedor->tiempo_entrega_dias > 15) {
            $advertencia = ' (Demora Crítica)';
        }

        $html .= "
                <tr>
                    <td>$proveedor->empresa</td>
                    <td>$proveedor->pais_origen</td>
                    <td>$proveedor->medicamento_principal</td>
                    <td>$proveedor->tiempo_entrega_dias días$advertencia</td>
                </tr>
        ";
    }

    $html .= '
                </tbody>
            </table>
    ';

    echo $html;
});

Route::get('/proveedores/internacionales', function () {

    $proveedores = [
        (object)[ 'empresa' => 'PharmaGlobal S.A.', 'pais_origen' => 'México', 'medicamento_principal' => 'Omeprazol', 'tiempo_entrega_dias' => 10 ],
        (object)[ 'empresa' => 'MedSupply Corp', 'pais_origen' => 'Estados Unidos', 'medicamento_principal' => 'Ondansetron', 'tiempo_entrega_dias' => 22 ],
        (object)[ 'empresa' => 'Farmacéutica del Sur', 'pais_origen' => 'Colombia', 'medicamento_principal' => 'Metoclopramida', 'tiempo_entrega_dias' => 18 ],
        (object)[ 'empresa' => 'AsiaMed Trading', 'pais_origen' => 'India', 'medicamento_principal' => 'Granisetron', 'tiempo_entrega_dias' => 7 ]
    ];

    $html = '
        <table border="1" cellspacing="0" cellpadding="8">
            <thead>
                <tr>
                    <th>Empresa</th>
                    <th>País de Origen</th>
                    <th>Medicamento Principal</th>
                    <th>Tiempo de Entrega (días)</th>
                </tr>
            </thead>
            <tbody>
    ';

    foreach ($proveedores as $proveedor) {
        $advertencia = '';
        if ($proveedor->tiempo_entrega_dias > 15) {
            $advertencia = ' (Demora Crítica)';
        }

        $html .= "
                <tr>
                    <td>{$proveedor->empresa}</td>
                    <td>{$proveedor->pais_origen}</td>
                    <td>{$proveedor->medicamento_principal}</td>
                    <td>{$proveedor->tiempo_entrega_dias} días{$advertencia}</td>
                </tr>
        ";
    }

    $html .= '
            </tbody>
        </table>
    ';

    echo $html;
});

Route::get('/lotes/inventario', function () {

    $lotes = [
        (object)[
            'codigo_lote' => 'LT-20260701',
            'nombre_medicamento' => 'Paracetamol 500mg',
            'cantidad_cajas' => 150,
            'temperatura_requerida_celsius' => 25
        ],
        (object)[
            'codigo_lote' => 'LT-20260702',
            'nombre_medicamento' => 'Insulina Glargina',
            'cantidad_cajas' => 45,
            'temperatura_requerida_celsius' => 4
        ],
        (object)[
            'codigo_lote' => 'LT-20260703',
            'nombre_medicamento' => 'Amoxicilina 875mg',
            'cantidad_cajas' => 80,
            'temperatura_requerida_celsius' => 20
        ]
    ];

    $html = '
        <table border="1" cellspacing="0" cellpadding="8">
            <thead>
                <tr>
                    <th>Código Lote</th>
                    <th>Nombre Medicamento</th>
                    <th>Cantidad de Cajas</th>
                    <th>Temperatura Requerida (°C)</th>
                </tr>
            </thead>
            <tbody>
    ';

    foreach ($lotes as $lote) {
        $cadena_frio = '';
        if ($lote->temperatura_requerida_celsius <= 5) {
            $cadena_frio = ' [Requiere Cadena de Frío]';
        }

        $html .= "
                <tr>
                    <td>{$lote->codigo_lote}</td>
                    <td>{$lote->nombre_medicamento}{$cadena_frio}</td>
                    <td>{$lote->cantidad_cajas}</td>
                    <td>{$lote->temperatura_requerida_celsius}</td>
                </tr>
        ";
    }

    $html .= '
            </tbody>
        </table>
    ';

    echo $html;
});

Route::get('/facturas/clientes/historial', function () {

    $facturas = json_decode(json_encode([
        ["num_factura" => "F-001", "cliente" => "Karen Criollo", "fecha_emision" => "2026-07-01", "total_pagar" => 125.50, "estado" => "Pagada"],
        ["num_factura" => "F-002", "cliente" => "Joel", "fecha_emision" => "2026-07-05", "total_pagar" => 89.00, "estado" => "Pendiente"],
        ["num_factura" => "F-003", "cliente" => "Cristofer Guevara", "fecha_emision" => "2026-07-08", "total_pagar" => 245.75, "estado" => "Pagada"],
        ["num_factura" => "F-004", "cliente" => "Karen Criollo", "fecha_emision" => "2026-07-10", "total_pagar" => 67.30, "estado" => "Pendiente"]
    ]));

    $html = '
        <table border="1" cellspacing="0" cellpadding="8">
            <thead>
                <tr>
                    <th>Nº Factura</th>
                    <th>Cliente</th>
                    <th>Fecha de Emisión</th>
                    <th>Total a Pagar</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
    ';

    foreach ($facturas as $factura) {
        $estado_html = $factura->estado;
        if ($factura->estado === 'Pendiente') {
            $estado_html = '<strong>pendiente (PENDIENTE DE COBRO)</strong>';
        }

        $html .= "
                <tr>
                    <td>{$factura->num_factura}</td>
                    <td>{$factura->cliente}</td>
                    <td>{$factura->fecha_emision}</td>
                    <td>\${$factura->total_pagar}</td>
                    <td>{$estado_html}</td>
                </tr>
        ";
    }

    $html .= '
            </tbody>
        </table>
    ';

    echo $html;
});

Route::get('/facturas/clientes/detalle/{numero}', function ($numero) {

    $facturas = json_decode(json_encode([
        ["num_factura" => "F-001", "cliente" => "Karen Criollo", "fecha_emision" => "2026-07-01", "total_pagar" => 125.50, "estado" => "Pagada"],
        ["num_factura" => "F-002", "cliente" => "Joel", "fecha_emision" => "2026-07-05", "total_pagar" => 89.00, "estado" => "Pendiente"],
        ["num_factura" => "F-003", "cliente" => "Cristofer Guevara", "fecha_emision" => "2026-07-08", "total_pagar" => 245.75, "estado" => "Pagada"],
        ["num_factura" => "F-004", "cliente" => "Karen Criollo", "fecha_emision" => "2026-07-10", "total_pagar" => 67.30, "estado" => "Pendiente"]
    ]));

    $factura_encontrada = null;

    foreach ($facturas as $factura) {
        if ($factura->num_factura === $numero) {
            $factura_encontrada = $factura;
            break;
        }
    }

    if ($factura_encontrada) {
        $html = '<h1>Ficha de Factura</h1>';
        $html .= '<hr>';
        $html .= '<p><strong>Nº Factura:</strong> ' . $factura_encontrada->num_factura . '</p>';
        $html .= '<p><strong>Cliente:</strong> ' . $factura_encontrada->cliente . '</p>';
        $html .= '<p><strong>Fecha de Emisión:</strong> ' . $factura_encontrada->fecha_emision . '</p>';
        $html .= '<p><strong>Total a Pagar:</strong> $' . $factura_encontrada->total_pagar . '</p>';
        
        if ($factura_encontrada->estado === 'Pendiente') {
            $html .= '<p><strong>Estado:</strong> <span style="color:red;">⚠ PENDIENTE DE COBRO</span></p>';
        } else {
            $html .= '<p><strong>Estado:</strong> ' . $factura_encontrada->estado . '</p>';
        }
    } else {
        $html = '<h1>Factura No Encontrada</h1>';
    }

    echo $html;
});

// ==================== EJERCICIO 6 ====================
Route::get('/facturas/proveedores/resumen', function () {

    $facturas = json_decode(json_encode([
        ["proveedor" => "PharmaGlobal S.A.", "nrc" => "NRC-45678", "monto_sin_iva" => 850.00],
        ["proveedor" => "MedSupply Corp", "nrc" => "NRC-98765", "monto_sin_iva" => 1240.50],
        ["proveedor" => "Farmacéutica del Sur", "nrc" => "NRC-33221", "monto_sin_iva" => 675.75],
        ["proveedor" => "AsiaMed Trading", "nrc" => "NRC-11223", "monto_sin_iva" => 980.00]
    ]));

    $total_sin_iva = 0;
    $total_iva = 0;
    $total_general = 0;

    $html = '
        <table border="1" cellspacing="0" cellpadding="8">
            <thead>
                <tr>
                    <th>Proveedor</th>
                    <th>NRC</th>
                    <th>Monto sin IVA</th>
                    <th>IVA (13%)</th>
                    <th>Monto Total</th>
                </tr>
            </thead>
            <tbody>
    ';

    foreach ($facturas as $factura) {
        $iva = $factura->monto_sin_iva * 0.13;
        $monto_total = $factura->monto_sin_iva + $iva;

        $total_sin_iva += $factura->monto_sin_iva;
        $total_iva += $iva;
        $total_general += $monto_total;

        $html .= "
                <tr>
                    <td>{$factura->proveedor}</td>
                    <td>{$factura->nrc}</td>
                    <td>\${$factura->monto_sin_iva}</td>
                    <td>\$" . number_format($iva, 2) . "</td>
                    <td>\$" . number_format($monto_total, 2) . "</td>
                </tr>
        ";
    }

    $html .= '
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"><strong>TOTAL GENERAL</strong></td>
                    <td><strong>$' . number_format($total_sin_iva, 2) . '</strong></td>
                    <td><strong>$' . number_format($total_iva, 2) . '</strong></td>
                    <td><strong>$' . number_format($total_general, 2) . '</strong></td>
                </tr>
            </tfoot>
        </table>
    ';

    echo $html;
});

Route::get('/Clientes/registro', function () {
    return view('Ejercicio.vista02');
});