import {uuid} from '@/Pages/Shared/helpers';
import moment from "moment";

export default (contex, method) => {
    return contex.$inertia.form({
        _method: method,
        id: uuid(),
        nombre: '',
        apellido: '',
        lugar_nacimiento: '',
        grado_instruccion: '',
        edad: 0,
        fecha_nacimiento: moment().format('YYYY-MM-DD'),
        estado_civil: '',
        telefono: '',
        dirrecion: '',
        observacion: '',
    })
}
