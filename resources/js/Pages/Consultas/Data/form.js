import {uuid} from '@/Pages/Shared/helpers';
import moment from "moment";
import document from "./documents";

export default (contex, method) => {
    return contex.$inertia.form({
        _method: method,
        id: method === 'POST' ? uuid() : '',
        codigo: '',
        paciente_id: '',
        fecha: moment().format('YYYY-MM-DDTHH:mm'),
        observaciones: '',
        indicaciones: '',
        motivo: '',
        reposo: '',
        documentos: [document(method)]
    })
}
