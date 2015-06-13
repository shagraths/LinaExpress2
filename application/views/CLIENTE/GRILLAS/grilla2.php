<div id="menu-tSubArea" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 row row-view">
	<div  class="headSeccion tabla row row-view">
		<span class="fa-stack fa-lg">
		  	<i class="fa fa-list fa-stack-1x fa-inverse"></i>
		</span>
		<label class="tituloSeccion">Listado</label>
		<label id="labelPaginador" class="pull-right"></label>
	</div>
	<div id="contenedor-tSubArea" class="row row-view contentSeccion tabla">
		<table id="tSubArea" class="table table-condensed table-nonfluid">
			<thead>
				<tr>				
					<th>Planta</th>
					<th>Área</th>
					<th>Nombre de la Sub-Área</th>
					<th>Estado</th>
				</tr>
			</thead>
			<tbody>
				<%_.each(dataTable,function(d){ %>
					<tr class="menu" id="<%=d.id%>" id_planta="<%=d.id_planta%>" user_id="<%=d.user_id%>" estado ="<%=d.estado%>">					
						<td><%=d.planta%></td>
						<td><%=d.area%></td>
						<td><%=d.nombre%></td>
						<td><%=d.estado%></td>
					</tr>
				<%});%>
			</tbody>
			<tfoot>
			</tfoot>
		</table>
	</div>
</div>