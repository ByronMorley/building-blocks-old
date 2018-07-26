<div class="background-image">
    <% if $BackgroundImage %>
        <img src="$BackgroundImage.Filename" class="bottom"/>
    <% end_if %>
    <%if $getBackgroundImage %>
        <img src="$getBackgroundImage.Filename" class="top"/>
    <% end_if %>
    <% if $BackgroundImage %>
        $setBackgroundImage($BackgroundImage.ID)
    <% end_if %>
</div>
