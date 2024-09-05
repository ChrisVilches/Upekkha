export const lineQr = (lineId) => ({
  init() {
    this.lineId = lineId;
  },

  async loadQr() {
    const qr = (await import("qr-encode")).default;
    this.qrData = this.qrData ?? qr(this.url, { type: 6, size: 6, level: "Q" });
  },

  get url() {
    return `line://ti/p/~${this.lineId}`;
  },

  qrData: null,
});
