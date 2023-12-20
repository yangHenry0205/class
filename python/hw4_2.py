
import pandas as pd

df = pd.read_csv("./data/edu_bigdata_imp1.csv",encoding="big5",low_memory=False)

df_filtered = df[df["dp002_extensions_alignment"]=='["十二年國民基本教育類"]']

print(len(df_filtered))