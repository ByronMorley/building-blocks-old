<div class="container">
	<main>
		<div class="pane title-pane">
			<div class="section left rel">
				<h1 class="title abs bottom left">$Title</h1>
			</div>
			<div class="section right">
				<div class="icon-rack-wrapper">
					<ul class="icon-rack abs bottom right">
						<li><a href="#"><i class="icon-printer"></i></a></li>
						<li><a href="#"><i class="icon-download"></i></a></li>
						<li><a href="$BlueLink"><i class="icon-presentation"></i></a></li>
					</ul>
				</div>
			</div>
		</div>

            <% include BreadcrumbNavigationTemplate %>

        <% if $Tabbed %>
			<div class="sm-hide xs-hide xxs-hide">
				<ul class="pane round top nav nav-tabs " id="nav-tab" role="tablist">
                    <% control $Sections %>
						<li class="nav-item">
							<a class="nav-link <% if $First %>active show<% end_if %>"
							   id="nav-tab-$ID"
							   data-toggle="tab"
							   href="#nav$ID"
							   role="tab"
							   aria-controls="nav$ID"
							   aria-selected="<% if $First %>true<% else %>false<% end_if %>">$Title</a>
						</li>
                    <% end_control %>
				</ul>
				<div class="tab-content" id="myTabContent">
                    <% control $Sections %>
						<div class="tab-pane fade <% if $First %>active show<% end_if %>" id="nav$ID" role="tabpanel"
							 aria-labelledby="nav-tab-$ID">
                            $Me
						</div>
                    <% end_control %>
				</div>
			</div>
			<div class="desktop xl-hide lg-hide md-hide">
				<div class="nav flex-column nav-pills pane round top" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <% control $Sections %>
						<a class="nav-link <% if $First %>active show<% end_if %>" id="v-pills-link-$ID" data-toggle="pill" href="#v-pills-$ID"
						   role="tab"
						   aria-controls="v-pills-$ID" aria-selected="true">$Title</a>
                    <% end_control %>
				</div>
				<div class="tab-content" id="v-pills-tabContent">
                    <% control $Sections %>
						<div class="tab-pane fade <% if $First %>active show<% end_if %>" id="v-pills-$ID" role="tabpanel"
							 aria-labelledby="v-pills-$ID">$Me
						</div>
                    <% end_control %>
				</div>
			</div>
        <% else %>
            <% control $Sections %>
                $Me
            <% end_control %>
        <% end_if %>
        <% if $Parent.Pagination %>
            <% include BlockPagination %>
        <% end_if %>
	</main>
</div>