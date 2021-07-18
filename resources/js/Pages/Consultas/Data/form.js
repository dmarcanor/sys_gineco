import {uuid} from '@/Pages/Shared/helpers';
import moment from "moment";

export default (contex, method) => {
    return contex.$inertia.form({
        _method: method,
        id: method === 'POST' ? uuid() : '',
        codigo: '',
        paciente_id: '',
        fecha: moment().format('YYYY-MM-DDTHH:mm:ss'),
        observaciones: '',
        indicaciones: '',
        motivo: '',
        reposo: ''
    })
}
