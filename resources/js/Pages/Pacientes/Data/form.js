import {uuid} from '@/Pages/Shared/helpers';

export default (contex, method) => {
    return contex.$inertia.form({
        _method: method,
        id: uuid(),
        nombre: '',
        apellido: '',
        lugar_nacimiento: '',
        grado_instruccion: '',
        edad: 0,
        estado_civil: '',
        motivo_consulta: '',
        telefono: '',
        dirrecion: '',
    })
}
