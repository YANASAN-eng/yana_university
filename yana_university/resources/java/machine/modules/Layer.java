package modules;

public class Layer {
    /** 入力 */
    public double[] input;
    /** 重み*/
    public double[][] weight;
    /** バイアス */
    public double[] bias;
    /** 関数列 */
    public Function[] functions;
    /** 出力 */
    public double[] output;
    /** コンストラクタ */
    public Layer(double[][] weight, double[] bias){
        this.weight = weight;
        this.bias = bias;
        int length = bias.length;
        this.functions = new Function[bias.length];
        for (int i = 0; i < length; i++) {
            this.functions[i] = Functions.identity;
        } 
    }
    public Layer(double[][] weight, double[] bias, Function[] functions) {
        this.weight = weight;
        this.bias = bias;
        this.functions = functions;
    }
}