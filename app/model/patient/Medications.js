 /**
 * Created by JetBrains PhpStorm.
 * User: Omar U. Rodriguez (Certun)
 * File:
 * Date: 2/18/12
 * Time: 11:09 PM
 */

Ext.define('App.model.patient.Medications', {
	extend: 'Ext.data.Model',
	fields: [

		{name: 'id', type: 'int'},
		{name: 'pid', type: 'int'},
		{name: 'eid', type: 'int'},
		{name: 'prescription_id', type: 'int'},
		{name: 'STR', type: 'string'},
		{name: 'CODE', type: 'string'},
		{name: 'RXCUI', type: 'string'},
		{name: 'ICDS', type: 'string'},
		{name: 'dose', type: 'string'},
		{name: 'take_pills', type: 'int'},
		{name: 'form', type: 'string'},
		{name: 'route', type: 'string'},
		{name: 'prescription_often', type: 'string'},
		{name: 'prescription_when', type: 'string'},
		{name: 'dispense', type: 'string'},
		{name: 'refill', type: 'string'},
		{name: 'create_date', type:'date', dateFormat:'Y-m-d H:i:s'},
		{name: 'begin_date', type:'date', dateFormat:'Y-m-d H:i:s'},
		{name: 'end_date', type:'date', dateFormat:'Y-m-d H:i:s'},

		{name: 'outcome', type: 'string'},
		{name: 'alert', type: 'bool'},
		{name: 'ocurrence', type: 'string'},
		{name: 'referred_by', type: 'string'},


	],
	proxy : {
		type: 'direct',
		api : {
			read  : Medical.getPatientMedications,
			create: Medical.addPatientMedications,
			update: Medical.updatePatientMedications
		}
	}
});

