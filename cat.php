
<!DOCTYPE html>
<html>
  <head>
    <title>Interactive Polyline Encoder Utility</title>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0yAKxfG_qB4p8DCP_VLbhniYICERatZI&callback=initMap"
  type="text/javascript"></script>
    </script>
    <style type="text/css">
      span.new {
        vertical-align: super;
        color: #cc0000;
        font-size: 70%;
      }
      .encodeBox {
        width: 550px;
        height: 40px;
        font-size: 14px;
        font-family: Courier;
      }
      .inputField {
        width: 160px;
      }
      #locations {
        width: 300px;
        font-size: 12px;
      }
      #map {
        width: 500px;
        height: 400px;
        border: 1px solid gray;
        margin-top:6px;
      }
      #txtAddress {
        width: 14em;
      }
    </style>
    <script src="google.js"></script>
  </head>
  <body>

<table>
  <tr valign="top">
    <td>
      <form method="post" action="javascript:void(0)" onsubmit="centerMap()">
        Center map at:
        <input type="text" id="txtAddress"/>
        <input type="submit" value="Search"/>
      </form>
      <div id="map"></div>
    </td>
    <td style="padding-left:20px">
      <table>
        <tr>
          <td align="right">Latitude:</td>
          <td><input id="txtLatitude" maxlength="11" type="text" class="inputField"/></td>
        </tr>
        <tr>
          <td align="right">Longitude:</td>
          <td><input id="txtLongitude" maxlength="11" type="text" class="inputField"/></td>
        </tr>
        <tr>
          <td align="right">Display Level:</td>
          <td><input id="txtLevel" type="text" size=3 value="3"/>
          <input type="button" value="Add Location" onclick="addLocationFromInput()"/></td>
        </tr>
        <tr>
          <td colspan=2 align="right"></td>
        </tr>
      </table>
      <br />
      <b>Locations list</b><br />
      <select id="locations" size="14" onchange="highlight(this.selectedIndex)"
        ondblclick="jumpToLocation()"></select>
      <br/>
      <input type="button" value="Delete Selected Location"
        onclick="deleteLocation()"/>
      <input type="button" value="Delete All Locations"
        onclick="deleteAllLocations()"/>
    </td>
  </tr>
</table>

</body>
</html>
