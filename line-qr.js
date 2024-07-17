export const lineQr = () => ({
  async loadQr() {
    const qr = (await import("qr-encode")).default;
    const content = this.$refs.img.getAttribute("data-qr-content");
    this.qrData = this.qrData ?? qr(content, { type: 6, size: 6, level: "Q" });
  },

  qrData: null,
});
