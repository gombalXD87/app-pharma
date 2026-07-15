<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Cliente</title>
    <link rel="stylesheet" href="{{ asset('css/vista02.css') }}">
</head>
<body>
    <div class="container">
        <div class="form-card">
            <div class="header">
                <h2>👤 Registro de Cliente</h2>
                <p>Ingrese los detalles para crear un nuevo registro de cliente.</p>
            </div>
            
            <form>
                <div class="form-group">
                    <label>Cliente</label>
                    <input type="text" value="CL-2001" readonly>
                </div>

                <div class="form-group">
                    <label>Teléfono de Contacto</label>
                    <input type="tel" value="+503 7123 4567" placeholder="Teléfono">
                </div>

                <div class="form-group">
                    <label>Nombre Completo</label>
                    <input type="text" value="Ana María García" placeholder="Nombre completo">
                </div>

                <div class="form-group">
                    <label>Municipio</label>
                    <select>
                        <option>Seleccionar Municipio...</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Dirección Completa</label>
                    <input type="text" value="Av. Las Camelias, No. 123" placeholder="Dirección">
                </div>

                <div class="form-group">
                    <label>Distrito</label>
                    <select>
                        <option>Seleccionar Distrito...</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Departamento</label>
                    <select>
                        <option>Seleccionar Departamento...</option>
                    </select>
                </div>

                <div class="buttons">
                    <button type="button" class="btn-save">Guardar Registro</button>
                    <button type="button" class="btn-cancel">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>