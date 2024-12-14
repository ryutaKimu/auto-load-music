import { setTimezone } from "./updateClock.js";

const timezone = document.getElementById("timezone");

timezone.addEventListener("change", async function () {
  const selectTimezone = this.value;

  const response = await fetch("../setTimezone.php", {
    method: "POST",
    headers: { "Content-type": "Application/json" },
    body: JSON.stringify({ timezone: selectTimezone }),
  });

  if (response.ok) {
    const timezoneData = await response.json();
    setTimezone(selectTimezone, timezoneData.converted_time);
    document.getElementById("currentTime").textContent =
      timezoneData.converted_time;
  } else {
    console.error("タイムゾーン変更に失敗しました");
  }
});
